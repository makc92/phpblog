<?php

use DI\Container;
use Delight\Auth\Auth;
use App\Classes\QueryBuilder;

$container = new Container();

function auth(){
    global $container;
    return new Auth($container->get('PDO'));
}


function redirect($path){
    header("Location: $path");
    exit;
}

function getCategories(){ //для того чтобы опрокинуть их в sidebar, лучшего варианта я не нашел
    global $container;
    $pdo = $container->get('PDO');
    $query = $container->get('Aura\SqlQuery\QueryFactory');
    $qb = new QueryBuilder($pdo,$query);
    return $qb->getAll('category');
}
function getCategory($id){ //для того чтобы опрокинуть их в sidebar, лучшего варианта я не нашел
    global $container;
    $pdo = $container->get('PDO');
    $query = $container->get('Aura\SqlQuery\QueryFactory');
    $qb = new QueryBuilder($pdo,$query);
    return $qb->getOne('category',$id);
}
function countCategory($id){ //для того чтобы опрокинуть их в sidebar, лучшего варианта я не нашел
    global $container;
    $pdo = $container->get('PDO');
    $query = $container->get('Aura\SqlQuery\QueryFactory');
    $qb = new QueryBuilder($pdo,$query);
    return count($qb->getAllbyID('posts', 'id_category', 'id', $id ));
}
