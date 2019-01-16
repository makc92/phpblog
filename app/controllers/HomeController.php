<?php


namespace App\controllers;
use App\controllers\CategoryController;
use App\Classes\QueryBuilder;
use League\Plates\Engine;
use Delight\Auth\Auth;


class HomeController
{
    private $engine;
    private $db;
    private $auth;
    private $category;

    public function __construct(QueryBuilder $db, Engine $engine, Auth $auth, CategoryController $category)
    {
        $this->db = $db;
        $this->engine = $engine;
        $this->auth = $auth;
        $this->category = $category;
    }

    public function index()
    {
        $posts = $this->db->getAll('posts');
        $auth = $this->auth->isLoggedIn();
        $category = $this->category->get_all_category();
        echo $this->engine->render('homepage', ['postsView' => $posts, 'title'=>'Блог', 'auth'=>$auth, 'category'=> $category]);
    }
    public function post($id)
    {
        $post = $this->db->getOne('posts', $id);
        echo $this->engine->render('post/post', ['postView' => $post]);
    }
}