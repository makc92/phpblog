<?php
namespace App\controllers;
use League\Plates\Engine;
use Delight\Auth\Auth;

class LoginController
{
    private $engine;
    private $auth;

    public function __construct(Engine $engine, Auth $auth)
    {
        $this->engine = $engine;
        $this->auth = $auth;
    }

    public function index()
    {
        echo $this->engine->render('auth/login');
    }

    public function login()
    {
        try {
            $this->auth->login($_POST['email'], $_POST['password']);

            flash()->success('Вы успешно вошли');
            redirect("/profile");
            die;
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error(['Неверный email']);
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error(['Неверный пароль']);
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            flash()->error(['Email не подтвержден']);
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error(['Большое количество попыток']);
        }
        redirect("/login");
    }

    public function logout()
    {
        $this->auth->logOut();
        redirect("/");
        die;
    }
}