<?php

namespace App\controllers;

use Delight\Auth\Auth;
use App\Classes\QueryBuilder;

class VerifyController
{
    private $auth;
    private $db;

    public function __construct(Auth $auth, QueryBuilder $db)
    {
        $this->auth = $auth;
        $this->db = $db;
    }

    public function verify_email()
    {
        try {
            $this->auth->confirmEmail($_GET['selector'], $_GET['token']);
            flash()->success('Вы подтвердили свой email');
            redirect("/register");
            die;
        }
        catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            flash()->error('Некорректный токен');
        }
        catch (\Delight\Auth\TokenExpiredException $e) {
            flash()->error('Срок действия токена истек');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->error('Пользователь уже существует');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('Слишком много попыток');
        }
        redirect("/register");
        die;
    }
    public function change_email()
    {
        try {
            $this->auth->confirmEmail($_GET['selector'], $_GET['token']);

            flash()->success('Email успешно изменен');
            redirect("/profile");
            die;
        }
        catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            flash()->error('Некорректный токен');
        }
        catch (\Delight\Auth\TokenExpiredException $e) {
            flash()->error('Срок действия токена истек');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->error('Пользователь уже существует');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error('Слишком много попыток');
        }
        redirect("/register");
        die;
    }
}