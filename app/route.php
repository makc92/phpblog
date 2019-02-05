<?php
use Aura\SqlQuery\QueryFactory;
use Delight\Auth\Auth;
use DI\ContainerBuilder;
use Intervention\Image\ImageManager;
use League\Plates\Engine;

$templates = new League\Plates\Engine('../app/views');
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
    },
    ImageManager::class=>function(){
        return new ImageManager(array('driver' => 'imagick'));
    }
));
$container = $ContainerBuilder->build();


$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', ['App\controllers\HomeController', 'index']);
    $r->addRoute('GET', '/category/{name}', ['App\controllers\HomeController', 'getСategory']);

    $r->addRoute('GET', '/register', ['App\controllers\RegisterController', 'index']);
    $r->addRoute('POST', '/register', ['App\controllers\RegisterController', 'register']);
    $r->addRoute('GET', '/forgot_password', ['App\controllers\RegisterController', 'show_recovery_form']);
    $r->addRoute('POST', '/recovery_password', ['App\controllers\RegisterController', 'recovery_password']);
    $r->addRoute('GET', '/recovery', ['App\controllers\RegisterController', 'vefify_recovery']);
    $r->addRoute('POST', '/new_password', ['App\controllers\RegisterController', 'new_password']);

    $r->addRoute('GET', '/verify', ['App\controllers\VerifyController', 'verify_email']);
    $r->addRoute('GET', '/changemail', ['App\controllers\VerifyController', 'change_email']);

    $r->addRoute('GET', '/login', ['App\controllers\LoginController', 'index']);
    $r->addRoute('POST', '/login', ['App\controllers\LoginController', 'login']);
    $r->addRoute('GET', '/logout', ['App\controllers\LoginController', 'logout']);

    $r->addRoute('GET', '/profile', ['App\controllers\UserController', 'index']);
    $r->addRoute('GET', '/profile/userinfo', ['App\controllers\UserController', 'userinfo']);
    $r->addRoute('POST', '/profile/userinfo/update/{id:\d+}', ['App\controllers\UserController', 'update_userinfo']);
    $r->addRoute('GET', '/profile/password', ['App\controllers\UserController', 'user_password']);
    $r->addRoute('POST', '/profile/password/change', ['App\controllers\UserController', 'change_password']);

    $r->addRoute('GET', '/post/{id:\d+}', ['App\controllers\PostController', 'post']);
    $r->addRoute('GET', '/profile/user_post', ['App\controllers\PostController', 'index']);
    $r->addRoute('GET', '/profile/user_post/add', ['App\controllers\PostController', 'create_post']);
    $r->addRoute('POST', '/add_post', ['App\controllers\PostController', 'add_post']);
    $r->addRoute('GET', '/user_post/edit/{id:\d+}', ['App\controllers\PostController', 'edit_post']);
    $r->addRoute('POST', '/user_post/update/{id:\d+}', ['App\controllers\PostController', 'update_post']);
    $r->addRoute('GET', '/user_post/delete/{id:\d+}', ['App\controllers\PostController', 'delete_post']);


    $r->addRoute('GET', '/admin', ['App\controllers\AdminController', 'index']);
    $r->addRoute('GET', '/admin/logout', ['App\controllers\AdminController', 'logout']);
    $r->addRoute('GET', '/admin/posts', ['App\controllers\AdminPostsController', 'index']);
    $r->addRoute('GET', '/admin/posts/create_post', ['App\controllers\AdminPostsController', 'create_post']);
    $r->addRoute('POST', '/admin/add_post', ['App\controllers\AdminPostsController', 'add_post']);
    $r->addRoute('GET', '/admin/delete/{id:\d+}', ['App\controllers\AdminPostsController', 'delete_post']);
    $r->addRoute('GET', '/admin/edit/{id:\d+}', ['App\controllers\AdminPostsController', 'edit_post']);
    $r->addRoute('POST', '/admin/update/{id:\d+}', ['App\controllers\AdminPostsController', 'update_post']);
    $r->addRoute('GET', '/admin/category', ['App\controllers\AdminCategoryController', 'index']);
    $r->addRoute('GET', '/admin/category/create', ['App\controllers\AdminCategoryController', 'create']);
    $r->addRoute('POST', '/admin/category/add', ['App\controllers\AdminCategoryController', 'add']);
    $r->addRoute('GET', '/admin/category/delete/{id:\d+}', ['App\controllers\AdminCategoryController', 'delete']);
    $r->addRoute('GET', '/admin/category/edit/{id:\d+}', ['App\controllers\AdminCategoryController', 'edit']);
    $r->addRoute('POST', '/admin/category/update/{id:\d+}', ['App\controllers\AdminCategoryController', 'update']);
    $r->addRoute('GET', '/admin/users', ['App\controllers\AdminUsersController', 'index']);
    $r->addRoute('GET', '/admin/users/ban/{id:\d+}', ['App\controllers\AdminUsersController', 'ban']);
    $r->addRoute('GET', '/admin/users/unban/{id:\d+}', ['App\controllers\AdminUsersController', 'unban']);
    $r->addRoute('GET', '/admin/users/getAdmin/{id:\d+}', ['App\controllers\AdminUsersController', 'getAdmin']);
    $r->addRoute('GET', '/admin/users/delete/{id:\d+}', ['App\controllers\AdminUsersController', 'deleteUser']);
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
        echo $templates->render('404');
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
