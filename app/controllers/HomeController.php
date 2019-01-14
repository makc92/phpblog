<?php


namespace App\controllers;
use App\Classes\QueryBuilder;
use League\Plates\Engine;


class HomeController
{
    private $engine;
    private $db;

    public function __construct(QueryBuilder $db, Engine $engine)
    {
        $this->db = $db;
        $this->engine = $engine;
    }

    public function index()
    {
        $posts = $this->db->getAll('posts');
        echo $this->engine->render('homepage', ['postsView' => $posts, 'title'=>'Блог']);
    }
    public function post($id)
    {
        $post = $this->db->getOne('posts', $id);
        echo $this->engine->render('post/post', ['postView' => $post]);
    }
}