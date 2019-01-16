<?php
use Aura\SqlQuery\QueryFactory;
use Delight\Auth\Auth;
use DI\ContainerBuilder;
use League\Plates\Engine;

$ContainerBuilder = new ContainerBuilder();
$ContainerBuilder->addDefinitions(array(
    Engine::class => function(){
        return new Engine('../app/views');
    },
    PDO::class => function(){
        $driver = "mysql";
        $host = "localhost";
        $db_name = "phpblog";
        $user = "root";
        $password = "";

        return new PDO("$driver:host=$host;dbname=$db_name", $user, $password);
    },
    Auth::class => function($container){
        return new Auth($container->get('PDO'));
    },
    QueryFactory::class => function(){
        return new QueryFactory('mysql');
    }
));
$container = $ContainerBuilder->build();


$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', ['App\controllers\HomeController', 'index']);
    $r->addRoute('GET', '/post/{id:\d+}', ['App\controllers\HomeController', 'post']);
    $r->addRoute('GET', '/register', ['App\controllers\RegisterController', 'show_register_form']);
    $r->addRoute('GET', '/recovery_password', ['App\controllers\RegisterController', 'show_recovery_form']);
    $r->addRoute('POST', '/register', ['App\controllers\RegisterController', 'register']);
    $r->addRoute('GET', '/verify', ['App\controllers\VerifyController', 'verify_email']);
    $r->addRoute('GET', '/login', ['App\controllers\LoginController', 'show_login_form']);
    $r->addRoute('POST', '/login', ['App\controllers\LoginController', 'login']);
    $r->addRoute('GET', '/logout', ['App\controllers\LoginController', 'logout']);
    $r->addRoute('GET', '/profile', ['App\controllers\UserController', 'show_user_template']);
    $r->addRoute('GET', '/user_post', ['App\controllers\UserController', 'show_user_post_template']);
    $r->addRoute('GET', '/user_profile', ['App\controllers\UserController', 'show_user_profile_template']);
    $r->addRoute('GET', '/user_password', ['App\controllers\UserController', 'show_user_password_template']);
});


// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
//d($routeInfo);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        echo 404;
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        echo "Не разрешен";
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $container->call($routeInfo[1], $routeInfo[2]);
        break;
}
