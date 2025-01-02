<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once '../core/App.php';

use app\controllers\PartnersController;
use app\controllers\SiteController;
use app\core\App ;
use app\core\UserModel;

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'userClass' => UserModel::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new App(dirname(__DIR__),$config);


$app->router->get('/',[SiteController::class,'home']); ;


$app->router->get('/contact', [SiteController::class,'contact']);
$app->router->post('/contact', [SiteController::class,'contact']);


$app->router->get('/login', [SiteController::class,'login']);
$app->router->post('/login', [SiteController::class,'login']);


$app->router->get('/register', [SiteController::class,'register']);
$app->router->post('/register', [SiteController::class,'register']);

$app->router->get('/logout', [SiteController::class,'logout']);


$app->router->get('/partners', [SiteController::class,'partners']);
$app->router->post('/partners', [SiteController::class,'partners']);


$app->router->get('/news', [SiteController::class,'news']);
$app->router->get('/tablePartners', [PartnersController::class,'partnersTable']);


$app->run();
