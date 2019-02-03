<?php
/**
 * Created by PhpStorm.
 * User: MakcS
 * Date: 01.02.2019
 * Time: 17:38
 */

namespace App\controllers;
use App\Classes\QueryBuilder;
use JasonGrimes\Paginator;
use League\Plates\Engine;
use Delight\Auth\Auth;

class AdminController
{
    private $engine;
    private $db;
    private $auth;

    public function __construct(QueryBuilder $db, Engine $engine, Auth $auth)
    {
        $this->db = $db;
        $this->engine = $engine;
        $this->auth = $auth;
        if (!$this->auth->hasRole(\Delight\Auth\Role::ADMIN)) {
            echo $this->engine->render('404');
            die;
        }
    }
    public  function index(){
        echo $this->engine->render('admin/homepage', ['title'=>'Админ панель']);
    }
    public  function logout(){
        $this->auth->logOut();
        redirect("/");
        die;
    }
}