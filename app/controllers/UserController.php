<?php

namespace App\controllers;
use Delight\Auth\Auth;
use App\Classes\QueryBuilder;
use League\Plates\Engine;

class UserController
{
    private $engine;
    private $db;
    private $auth;

    public function __construct(QueryBuilder $db, Engine $engine, Auth $auth)
    {
        $this->db = $db;
        $this->engine = $engine;
        $this->auth = $auth;
    }

    public function show_user_template()
    {
        $user = $this->auth->getUsername();
        echo $this->engine->render('user/user_page', ['username'=>$user]);
    }

    public function show_user_post_template()
    {
        echo $this->engine->render('user/user_post');
    }
    public function show_user_profile_template()
    {
        echo $this->engine->render('user/user_profile');
    }
    public function show_user_password_template()
    {
        echo $this->engine->render('user/user_password');
    }
}