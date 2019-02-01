<?php
/**
 * Created by PhpStorm.
 * User: MakcS
 * Date: 01.02.2019
 * Time: 18:11
 */

namespace App\controllers;
use App\Classes\QueryBuilder;
use League\Plates\Engine;
use Delight\Auth\Auth;
use JasonGrimes\Paginator;

class AdminUsersController
{
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
        $totalItems = $this->db->getAll('users');
        $currentPage = $_GET['page'] ?? 1;
        $itemsPerPage = 10;
        $urlPattern = "?page=(:num)";
        $users = $this->db->getAllPaginate('users', $itemsPerPage, $currentPage);
        $paginator = new Paginator(count($totalItems), $itemsPerPage, $currentPage, $urlPattern);
        echo $this->engine->render('admin/users', ['title' => 'Админ панель', 'users' => $users, 'paginator' => $paginator]);
    }

}