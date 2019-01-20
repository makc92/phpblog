<?php

namespace App\controllers;

use Delight\Auth\Auth;
use App\Classes\QueryBuilder;
use League\Plates\Engine;

class PostController
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
        $posts = $this->db->getAllbyID('posts','id_user', $this->auth->getUserId());
        echo $this->engine->render('user/user_post', ['user_posts'=>$posts]);
    }
    public function create_post()
    {
        echo $this->engine->render('post/add_post');
    }

    public function add_post()
    {

        $data = [
            'title'=>$_POST['title'],
            'content'=>$_POST['content'],
            'id_category'=>$_POST['category'],
            'id_user'=>$_POST['user'],
        ];
        $this->db->insert($data,'posts');
        flash()->success('Запись успешно добавлена');
        redirect("/user_post");

    }

    public function edit_post($id)
    {
        $post = $this->db->getOne('posts', $id);
        echo $this->engine->render('post/edit_post', ['post'=>$post]);
    }
    public function update_post($id)
    {
        $data = [
          'title'=> $_POST['title'],
          'content'=> $_POST['content'],
          'id_category'=> $_POST['category']
        ];
        $this->db->update('posts', $data, $id);
        flash()->success('Запись успешно обновлена');
        redirect("/user_post");

    }
    public function delete_post($id)
    {
        $this->db->delete('posts', $id);
        flash()->success('Запись успешно удалена');
        redirect("/user_post");
    }
}