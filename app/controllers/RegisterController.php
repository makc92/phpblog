<?php
/**
 * Created by PhpStorm.
 * User: MakcS
 * Date: 14.01.2019
 * Time: 14:12
 */

namespace App\controllers;
use App\Classes\QueryBuilder;
use League\Plates\Engine;
use Delight\Auth\Auth;
use PDO;


class RegisterController
{
    private $db;
    private $engine;
//    private $auth;

    public function __construct(QueryBuilder $db, Engine $engine)
    {
        $this->db = $db;
        $this->engine = $engine;
//        $this->auth = $auth;
    }

    public function show_register_form()
    {
//        d($this->auth);
        echo $this->engine->render('auth/register');
    }
    public function show_login_form()
    {
        echo $this->engine->render('auth/login');
    }
    public function show_recovery_form()
    {
        echo $this->engine->render('auth/recovery');
    }
    public function register()
    {
        try {
            $userId = $this->auth->register($_POST['email'], $_POST['password'], $_POST['username'], function ($selector, $token) {
                echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
            });

            echo 'We have signed up a new user with the ID ' . $userId;
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Invalid email address');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Invalid password');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('User already exists');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }
    }
}