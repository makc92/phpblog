<?php
/**
 * Created by PhpStorm.
 * User: MakcS
 * Date: 01.02.2019
 * Time: 18:20
 */

namespace App\controllers;

use App\Classes\QueryBuilder;
use League\Plates\Engine;
use Delight\Auth\Auth;
use JasonGrimes\Paginator;


class AdminCategoryController
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

    public function index()
    {
        $totalItems = $this->db->getAll('category');
        $currentPage = $_GET['page'] ?? 1;
        $itemsPerPage = 10;
        $urlPattern = "?page=(:num)";
        $categories = $this->db->getAllPaginate('category', $itemsPerPage, $currentPage);
        $paginator = new Paginator(count($totalItems), $itemsPerPage, $currentPage, $urlPattern);
        echo $this->engine->render('admin/categories/category', ['categories' => $categories]);
    }

    public function create()
    {
        echo $this->engine->render('admin/categories/add');
    }

    public function add()
    {
        $data = [
            'name' => $_POST['category']
        ];
        $this->db->insert($data, 'category');
        flash()->success('Категория успешно добавлена');
        redirect("/admin/category");
    }

    public function delete($id)
    {
        $this->db->delete('category', $id);
        flash()->success('Категория успешно удалена');
        redirect("/admin/category");
    }

    public function edit($id)
    {
        $category = $this->db->getOne('category', $id);
        echo $this->engine->render('admin/categories/edit', ['category' => $category]);
    }

    public function update($id)
    {
        $date = [
            'name' => $_POST['category']
        ];
        $category = $this->db->update('category', $date, $id);
        flash()->success('Категория успешно изменена');
        redirect("/admin/category");
    }
}