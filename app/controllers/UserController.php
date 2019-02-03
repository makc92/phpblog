<?php

namespace App\controllers;
use App\classes\Mailer;
use Delight\Auth\Auth;
use App\Classes\QueryBuilder;
use League\Plates\Engine;

class UserController
{
    private $engine;
    private $db;
    private $auth;
    private $mail;

    public function __construct(QueryBuilder $db, Engine $engine, Auth $auth, Mailer $mailer)
    {
        $this->db = $db;
        $this->engine = $engine;
        $this->auth = $auth;
        $this->mail = $mailer;
        if(!$this->auth->isLoggedIn()) {
            flash()->error('Ты не залогинен');
            redirect("/");
            die;
        }
    }

    public function index()
    {
        echo $this->engine->render('user/user_page');
    }
    public function userinfo()
    {
        $user_info = $this->db->getOne('users', $this->auth->getUserId());
        echo $this->engine->render('user/user_profile', ['user_info'=>$user_info]);
    }
    public function update_userinfo($id)
    {
        try {
            if ($this->auth->reconfirmPassword($_POST['password'])) {
                $this->db->update('users',['username'=>$_POST['name']], $id);
                $this->auth->changeEmail($_POST['email'], function ($selector, $token) {
                    flash()->success(['На вашу почту ' . $_POST['email'] . ' был отправлен код с подтверждением. Изменение вступит в силу, как только новый адрес электронной почты будет подтвержден']);
                    $url = 'http://phpblog/changemail?selector=' . \urlencode($selector) . '&token=' . \urlencode($token);
                    $mess = "<a href=\"$url\">подтвердите смену email</a>";
                    $this->mail->send($_POST['email'], $mess);
                });
                redirect("/profile");
            }
            else {
                flash()->error(['Вы ввели неправильный пароль']);
                redirect("/profile/userinfo");
            }
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error(['Неверный email']);
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->error(['Email уже существует']);
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            flash()->error(['Email не подтверджен']);
        }
        catch (\Delight\Auth\NotLoggedInException $e) {
            flash()->error(['Вы не вошли в систему']);
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error(['Большое количество попыток']);
        }
        redirect("/profile/userinfo");

    }
    public function user_password()
    {
        echo $this->engine->render('user/user_password');
    }

    public function change_password()
    {
        try {
            $this->auth->changePassword($_POST['pass'], $_POST['new_pass']);
            flash()->success(['Пароль изменен']);
            redirect("/profile");
        }
        catch (\Delight\Auth\NotLoggedInException $e) {
            flash()->error(['Вы не вошли в систему']);
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error(['Неверный пароль']);
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error(['Большое количество попыток']);
        }
        redirect("/profile/password");
    }



}