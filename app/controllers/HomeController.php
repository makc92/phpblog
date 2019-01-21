<?php


namespace App\controllers;
use App\Classes\QueryBuilder;
use League\Plates\Engine;
use Delight\Auth\Auth;


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
        $posts = $this->db->getAll('posts', 'date');
        $auth = $this->auth->isLoggedIn();
        echo $this->engine->render('homepage', ['postsView' => $posts, 'title'=>'Блог', 'auth'=>$auth]);
    }
    public function post($id)
    {
        $post = $this->db->getOne('posts', $id);
        $category_name = $this->db->getOne('category','id_category' ,$post['id_category']);
        echo $this->engine->render('post/post', ['postView' => $post, 'category_name'=>$category_name]);
    }
    public function get_posts_by_category($name){
        $categoryId = $this->db->getByName('category', 'id', 'name', $name);
        $category = $this->db->getAllbyID('posts','id_category','date',$categoryId['id']);
        echo $this->engine->render('category', ['categoryView' => $category, 'category_name'=>$name]);
    }

}