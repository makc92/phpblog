<?php

namespace App\controllers;

use App\classes\ImageManager;
use Delight\Auth\Auth;
use App\Classes\QueryBuilder;
use League\Plates\Engine;
use JasonGrimes\Paginator;


class PostController
{
    private $engine;
    private $db;
    private $auth;
    private $image;

    public function __construct(QueryBuilder $db, Engine $engine, Auth $auth,ImageManager $image)
    {
        $this->db = $db;
        $this->engine = $engine;
        $this->auth = $auth;
        $this->image = $image;
    }
    public function index()
    {
        $currentPage = $_GET['page'] ?? 1;
        $itemsPerPage = 3;
        $urlPattern = "/profile/user_post?page=(:num)";
        $totalItems = $this->db->getAllbyID('posts','id_user','id',$this->auth->getUserId());
        $posts = $this->db->getAllPaginateById('posts','date', 'id_user', $this->auth->getUserId(), $itemsPerPage, $currentPage);
        $paginator = new Paginator(count($totalItems), $itemsPerPage, $currentPage, $urlPattern);
        echo $this->engine->render('user/user_post', ['user_posts'=>$posts, 'paginator'=>$paginator]);
    }
    public function create_post()
    {
        echo $this->engine->render('post/add_post');
    }

    public function add_post()
    {
        $image = $this->image->uploadImage($_FILES['file']);
        $data = [
            'title'=>$_POST['title'],
            'content'=>$_POST['content'],
            'image' => $image,
            'id_category'=>$_POST['category'],
            'id_user'=>$_POST['user'],
        ];
        $this->db->insert($data,'posts');
        flash()->success('Запись успешно добавлена');
        redirect("/profile/user_post");

    }

    public function edit_post($id)
    {
        $post = $this->db->getOne('posts', $id);
        echo $this->engine->render('post/edit_post', ['post'=>$post]);
    }
    public function update_post($id)
    {
        $oldImage = substr($_POST['oldImage'],5);
        $image = $this->image->uploadImage($_FILES['file']);
        $this->image->deleteImage($oldImage);

        $data = [
          'title'=> $_POST['title'],
          'content'=> $_POST['content'],
            'image' => $image,
          'id_category'=> $_POST['category']
        ];
        $this->db->update('posts', $data, $id);
        flash()->success('Запись успешно обновлена');
        redirect("/profile/user_post");

    }
    public function delete_post($id)
    {
        $filename = $this->db->getOne('posts', $id);
        $this->db->delete('posts', $id);
        $this->image->deleteImage($filename['image']);
        flash()->success('Запись успешно удалена');
        redirect("/profile/user_post");
    }
}