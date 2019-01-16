<?php

use DI\Container;
use Delight\Auth\Auth;

$container = new Container();

function auth(){
    global $container;
    return new Auth($container->get('PDO'));
}


function redirect($path){
    header("Location: $path");
    exit;
}
