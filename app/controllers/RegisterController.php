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

class RegisterController
{
    private $engine;
    private $auth;
    private $mail;

    public function __construct(Engine $engine, Auth $auth, Mailer $mailer)
    {
        $this->engine = $engine;
        $this->auth = $auth;
        $this->mail = $mailer;
    }

    public function show_register_form()
    {
//        d($this->auth->isLoggedIn());die;
        echo $this->engine->render('auth/register');
    }
    public function show_recovery_form()
    {
        echo $this->engine->render('auth/recovery');
    }
    public function register()
    {
        try {
            $this->auth->register($_POST['email'], $_POST['password'], $_POST['name'], function ($selector, $token) {
                flash()->success(['На вашу почту ' . $_POST['email'] . ' был отправлен код с подтверждением.']);
//                $mess = "http://phpblog/verify?selector=" . $selector . "&token=" . $token;
                $mess =  "<a href=\"http://phpblog/verify?selector={$selector}&token={$token}\">подтвердить email</a>";

//                $mess =  "<b>asdfsadfsdafsdafsdaf</b>";
                $this->mail->send($_POST['email'], $mess);

            });
            redirect("/register");
            die;
//            echo 'We have signed up a new user with the ID ' . $userId;
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error(['Некорректный адресс электронной почты']);
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error(['Некорректный пароль']);
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->error(['Пользователь уже существует']);
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error(['Большое количество попыток регистрации']);
        }
        redirect("/register");
        die;
    }
}