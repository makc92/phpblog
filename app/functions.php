<?php

use DI\Container;
use Delight\Auth\Auth;
use App\Classes\QueryBuilder;

$container = new Container();

/*Чтобы можно было пользоваться объектом Auth в частях страниц*/
function auth(){
    global $container;
    return new Auth($container->get('PDO'));
}
/*Чтобы можно было пользоваться объектом Auth в частях страниц*/

function redirect($path){
    header("Location: $path");
    exit;
}
/*Чтобы кинуть категории в sidebar, но мне кажется есть другой способ скорее всего*/
function getCategories(){
    global $container;
    $pdo = $container->get('PDO');
    $query = $container->get('Aura\SqlQuery\QueryFactory');
    $qb = new QueryBuilder($pdo,$query);
    return $qb->getAll('category');
}

function getCategory($id){
    global $container;
    $pdo = $container->get('PDO');
    $query = $container->get('Aura\SqlQuery\QueryFactory');
    $db = new QueryBuilder($pdo,$query);
    return $db->getOne('category',$id);
}
function countCategory($id){
    global $container;
    $pdo = $container->get('PDO');
    $query = $container->get('Aura\SqlQuery\QueryFactory');
    $db = new QueryBuilder($pdo,$query);
    return count($db->getAllbyID('posts', 'id_category', 'id', $id ));
}
/*Чтобы кинуть категории в sidebar, но мне кажется есть другой способ скорее всего*/



function getImage($image){
    return '/img/' . $image;
}