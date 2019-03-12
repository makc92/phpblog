<?php
/**
 * Created by PhpStorm.
 * User: MakcS
 * Date: 01.02.2019
 * Time: 18:04
 */

namespace App\controllers;

use App\Classes\QueryBuilder;
use Aura\Filter\FilterFactory;
use League\Plates\Engine;
use Delight\Auth\Auth;
use JasonGrimes\Paginator;
use App\classes\ImageManager;

class AdminPostsController
{
    private $filter;
    private $engine;
    private $db;
    private $auth;
    private $image;
    private $validate;
    
    public function __construct(QueryBuilder $db, Engine $engine, Auth $auth, ImageManager $image, FilterFactory $validate)
    {
        $this->db = $db;
        $this->engine = $engine;
        $this->auth = $auth;
        $this->image = $image;
        $this->validate = $validate;
        $this->filter = $this->validate->newSubjectFilter();
        if (!$this->auth->hasRole(\Delight\Auth\Role::ADMIN)) {
            echo $this->engine->render('404');
            die;
        }
    }

    public function index()
    {
        $totalItems = $this->db->getAll('posts');
        $currentPage = $_GET['page'] ?? 1;
        $itemsPerPage = 5;
        $urlPattern = "?page=(:num)";
        $posts = $this->db->getAllPaginate('posts', $itemsPerPage, $currentPage);
        $paginator = new Paginator(count($totalItems), $itemsPerPage, $currentPage, $urlPattern);
        echo $this->engine->render('admin/posts/posts', ['title' => 'Админ панель', 'posts' => $posts, 'paginator' => $paginator]);
    }

    public function create_post()
    {
        echo $this->engine->render('admin/posts/add_post');
    }

    public function add_post()
    {
        $filterData = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'category' => $_POST['category'],
            'image'=>$_FILES['file']['name']
        ];

        /*Сама фильрация*/
        $this->filter->validate("title")->isNotBlank()->setMessage('Вы не заполнили название статьи');
        $this->filter->validate("content")->isNotBlank()->setMessage('Вы не заполнили контент статьи');
        $this->filter->validate("category")->isNotBlank()->is('int')->setMessage('Категория выбрана неверное');
        $this->filter->validate('image')->isNotBlank()->setMessage('Картинка не выбрана');
        $this->validate($filterData);

        $image = $this->image->uploadImage($_FILES['file']);
        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'image' => $image,
            'id_category' => $_POST['category'],
            'id_user' => $_POST['user'],
        ];
        $this->db->insert($data, 'posts');
        flash()->success('Запись успешно добавлена');
        redirect("/admin/posts");
    }
    public function delete_post($id){
        $filename = $this->db->getOne('posts', $id);
        $this->db->delete('posts', $id);
        $this->image->deleteImage($filename['image']);
        flash()->success('Запись успешно удалена');
        redirect("/admin/posts");
    }
    public function edit_post($id){
        $post = $this->db->getOne('posts', $id);
        echo $this->engine->render('admin/posts/edit_post', ['post'=>$post]);
    }
    public function update_post($id) {
        $oldImage = substr($_POST['oldImage'], 5); //название старой картинки, чтобы удалить
        if (empty($_FILES['file']['tmp_name'])) {
            $image = $oldImage;
        }
        else {
            $image = $this->image->uploadImage($_FILES['file']);
            $this->image->deleteImage($oldImage);
        }

        $data = [
            'title'=> $_POST['title'],
            'content'=> $_POST['content'],
            'image' => $image,
            'id_category'=> $_POST['category']
        ];
        $this->db->update('posts', $data, $id);
        flash()->success('Запись успешно обновлена');
        redirect("/admin/posts");
    }
    public function validate($data)
    {
        $valid = $this->filter->apply($data);
        if (!$valid) {
            $failures = $this->filter->getFailures();
            $messages = $failures->getMessages();
            foreach ($messages as $message) {
                flash()->error($message);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}