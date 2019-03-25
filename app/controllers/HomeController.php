<?php


namespace App\controllers;

use App\classes\Image;
use App\Classes\QueryBuilder;
use JasonGrimes\Paginator;
use League\Plates\Engine;
use Delight\Auth\Auth;
use Intervention\Image\ImageManager;


class HomeController
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

    public function index()
    {
        $totalItems = $this->db->getAll('posts');
        $currentPage = $_GET['page'] ?? 1;
        $itemsPerPage = 4;
        $urlPattern = "?page=(:num)";
        $posts = $this->db->getAllPaginate('posts', $itemsPerPage, $currentPage);
        $paginator = new Paginator(count($totalItems), $itemsPerPage, $currentPage, $urlPattern);
        echo $this->engine->render('homepage', ['postsView' => $posts, 'title' => 'Блог', 'paginator' => $paginator]);

    }

    public function getСategory($name)
    {
        $categoryId = $this->db->getByName('category', 'id', 'name', $name);
        $currentPage = $_GET['page'] ?? 1;
        $itemsPerPage = 3;
        $urlPattern = "/category/$name?page=(:num)";
        $totalItems = $this->db->getAllbyID('posts', 'id_category', 'date', $categoryId['id']);
        $post = $this->db->getAllPaginateById('posts', 'date', 'id_category', $categoryId['id'], $itemsPerPage, $currentPage);
        $paginator = new Paginator(count($totalItems), $itemsPerPage, $currentPage, $urlPattern);
        echo $this->engine->render('category', ['categoryView' => $post, 'category_name' => $name, 'paginator' => $paginator]);
    }

}