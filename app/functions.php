<?php

use DI\Container;
use Delight\Auth\Auth;
use App\Classes\QueryBuilder;

$container = new Container();

function auth()
{
    global $container;
    return new Auth($container->get('PDO'));
}

function redirect($path)
{
    header("Location: $path");
    exit;
}

function getCategories()
{
    global $container;
    $pdo = $container->get('PDO');
    $query = $container->get('Aura\SqlQuery\QueryFactory');
    $qb = new QueryBuilder($pdo, $query);
    return $qb->getAll('category');
}

function getCategory($id)
{
    global $container;
    $pdo = $container->get('PDO');
    $query = $container->get('Aura\SqlQuery\QueryFactory');
    $db = new QueryBuilder($pdo, $query);
    return $db->getOne('category', $id);
}

function countCategory($id)
{
    global $container;
    $pdo = $container->get('PDO');
    $query = $container->get('Aura\SqlQuery\QueryFactory');
    $db = new QueryBuilder($pdo, $query);
    return count($db->getAllbyID('posts', 'id_category', 'id', $id));
}

function getUserName($id)
{
    global $container;
    $pdo = $container->get('PDO');
    $query = $container->get('Aura\SqlQuery\QueryFactory');
    $db = new QueryBuilder($pdo, $query);
    $user = $db->getOne('users', $id);
    return $user['username'];
}


function getImage($image)
{
    return '/img/' . $image;
}