<?php

use Thanhdo\Mvcoop\Controllers\Admin\AuthenticateController;
use Thanhdo\Mvcoop\Controllers\Admin\CategoryController;

use Thanhdo\Mvcoop\Controllers\Admin\PostController;
use Thanhdo\Mvcoop\Controllers\Admin\UserController;
use Thanhdo\Mvcoop\Controllers\Client\HomeController;

use Thanhdo\Mvcoop\Controllers\Admin\DashboardController;
use Thanhdo\Mvcoop\Controllers\Client\ClientCategoryController;
use Thanhdo\Mvcoop\Controllers\Client\ClientPostController;
use Thanhdo\Mvcoop\Controllers\Client\ContactController;
use Thanhdo\Mvcoop\Controllers\Client\SearchController;

$router = new \Bramus\Router\Router();



$router->get('/', HomeController::class . '@index');



$router->match('GET|POST', '/post/{id}', ClientPostController::class . '@show');


$router->mount('/{id}/category-post', function () use ($router) {
    $router->get('/',                           ClientCategoryController::class . '@list');
    $router->get('/{page}/page/',                 ClientCategoryController::class . '@list');
});

$router->get('/search',                          SearchController::class . '@search');

$router->get('/about', HomeController::class . '@about');
$router->get('/contact', ContactController::class . '@contact');



$router->match('GET|POST', 'auth/login', AuthenticateController::class . '@login');


$router->mount('/admin', function () use ($router) {


    $router->get('/', DashboardController::class . '@index');
    $router->get('/logout', AuthenticateController::class . '@logout');

    $router->mount('/users', function () use ($router) {
        $router->get('/',                           UserController::class . '@index');
        $router->get('/{id}/show',                       UserController::class . '@show');
        $router->get('/{id}/delete',                UserController::class . '@delete');
        $router->match('GET|POST', '/{id}/update',  UserController::class . '@update');
        $router->match('GET|POST', '/create',       UserController::class . '@create');
    });


    $router->mount('/category', function () use ($router) {
        $router->get('/',                           CategoryController::class . '@index');
        $router->get('/{id}/show',                  CategoryController::class . '@show');
        $router->get('/{id}/delete',                CategoryController::class . '@delete');
        $router->match('GET|POST', '/{id}/update',  CategoryController::class . '@update');
        $router->match('GET|POST', '/create',       CategoryController::class . '@create');
    });

    $router->mount('/post', function () use ($router) {
        $router->get('/',                           PostController::class . '@index');
        // $router->get('/{id}/show',                  PostController::class . '@show');
        $router->mount('/{id}/show', function () use ($router) {
            $router->get('/',                           PostController::class . '@show');
            $router->get('/comment/{id_comment}/delete',  PostController::class . '@deleteComment');
        });
        $router->get('/{id}/delete',                PostController::class . '@delete');
        $router->match('GET|POST', '/{id}/update',  PostController::class . '@update');
        $router->match('GET|POST', '/create',       PostController::class . '@create');
        // $router->get('/{id_post}/show/comment/{id_comment}/delete',  PostController::class. '@deleteComment');
    });
});

$router->before('GET|POST', '/admin/*', function () {
    if (!isset($_SESSION['user'])) {
        header("Location:/auth/login");
        exit();
    }
});

$router->before('GET|POST', '/admin/.*', function () {
    if (!isset($_SESSION['user'])) {
        header("Location:/auth/login");
        exit();
    }
});


$router->run();
