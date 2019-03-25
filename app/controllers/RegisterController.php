<?php
/**
 * Created by PhpStorm.
 * User: MakcS
 * Date: 14.01.2019
 * Time: 14:12
 */

namespace App\controllers;

use App\classes\Mailer;
use League\Plates\Engine;
use Delight\Auth\Auth;
use App\Classes\QueryBuilder;
use Aura\Filter\FilterFactory;


class RegisterController
{
    private $engine;
    private $auth;
    private $mail;
    private $validate;
    private $filter;

    public function __construct(Engine $engine, Auth $auth, Mailer $mailer, QueryBuilder $db, FilterFactory $validate)
    {
        $this->engine = $engine;
        $this->auth = $auth;
        $this->mail = $mailer;
        $this->db = $db;
        /*Вот это правильно ли?*/
        $this->validate = $validate;
        $this->filter = $this->validate->newSubjectFilter();
        /*Вот это правильно ли?*/
    }

    public function index()
    {
//        d($this->auth->isLoggedIn());die;
        echo $this->engine->render('auth/register');
    }

    public function register()
    {
        $filterData = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];
        $this->filter->validate("name")->isNotBlank()->setMessage('Вы не заполнили имя');
        $this->filter->validate("email")->isNotBlank()->setMessage('Вы не заполнили email');
        $this->filter->validate("password")->isNotBlank()->setMessage('Вы не заполнили пароль');
        $this->validate($filterData);

        try {
            $id = $this->auth->register($_POST['email'], $_POST['password'], $_POST['name'], function ($selector, $token) {
                flash()->success(['На вашу почту ' . $_POST['email'] . ' был отправлен код с подтверждением.']);
                $url = 'http://phpblog/verify?selector=' . \urlencode($selector) . '&token=' . \urlencode($token);
                $mess = "<a href=\"$url\">подтвердить email</a>";
                $this->mail->send($_POST['email'], $mess);
            });
            $data = [
                'roles_mask' => \Delight\Auth\Role::AUTHOR
            ];
            $this->db->update('users', $data, $id);
            redirect("/register");
            die;
        } catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error(['Некорректный адресс электронной почты']);
        } catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error(['Некорректный пароль']);
        } catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->error(['Пользователь уже существует']);
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error(['Большое количество попыток регистрации']);
        }
        redirect("/register");
        die;
    }

    public function show_recovery_form()
    {
        echo $this->engine->render('auth/recovery');
    }

    public function recovery_password()
    {
        try {
            $this->auth->forgotPassword($_POST['email'], function ($selector, $token) {
                flash()->success(['На вашу почту ' . $_POST['email'] . ' был отправлен запрос по смене пароля']);
                $mess = "<a href=\"http://phpblog/recovery?selector={$selector}&token={$token}\">Подтвердите смену пароля</a>";
                $this->mail->send($_POST['email'], $mess);
            });


            redirect("/forgot_password");
            die;
        } catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error(['неверный email']);
        } catch (\Delight\Auth\EmailNotVerifiedException $e) {
            flash()->error(['email не подтвержден']);
        } catch (\Delight\Auth\ResetDisabledException $e) {
            flash()->error(['смена пароля отключена']);
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error(['много попыток']);
        }
        redirect("/forgot_password");
        die;
    }

    public function vefify_recovery()
    {
        if ($this->auth->canResetPassword($_GET['selector'], $_GET['token'])) {
            echo $this->engine->render('auth/newPassword', ['selector' => $_GET['selector'], 'token' => $_GET['token']]);
        }
    }

    public function new_password()
    {
        try {
            $this->auth->resetPassword($_POST['selector'], $_POST['token'], $_POST['password']);
            flash()->success(['Пароль успешно изменен']);
            redirect("/login");
            die;
        } catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            flash()->error(['неверный токен']);
        } catch (\Delight\Auth\TokenExpiredException $e) {
            flash()->error(['токен истек']);
        } catch (\Delight\Auth\ResetDisabledException $e) {
            flash()->error(['смена пароля отключена']);
        } catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error(['неверный пароль']);
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error(['много попыток']);
        }
        redirect("/recovery");
        die;
    }

    public function validate($data)
    {
        $valid = $this->filter->apply($data);
        if (!$valid) {
            $failures = $this->filter->getFailures();
            $messages = $failures->getMessages();
            foreach ($messages as $message) {
                flash()->error($message);
            }
            redirect('/register');
            die;
        }
    }
}