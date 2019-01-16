<?php
/**
 * Created by PhpStorm.
 * User: Макс
 * Date: 16.01.2019
 * Time: 17:36
 */

namespace App\controllers;
use App\Classes\QueryBuilder;
use League\Plates\Engine;
use Delight\Auth\Auth;

class LoginController
{
    private $db;
    private $engine;
    private $auth;

    public function __construct(QueryBuilder $db, Engine $engine, Auth $auth)
    {
        $this->db = $db;
        $this->engine = $engine;
        $this->auth = $auth;
    }

    public function show_login_form()
    {
        echo $this->engine->render('auth/login');
    }

    public function login()
    {
        try {
            $this->auth->login($_POST['email'], $_POST['password']);

            flash()->success('Вы успешно вошли');
            redirect("/login");
            die;
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Wrong email address');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Wrong password');
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            die('Email not verified');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }

    public function logout()
    {
        $this->auth->logOut();
        redirect("/");
        die;
    }
}