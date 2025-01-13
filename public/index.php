<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once '../core/App.php';

use app\controllers\AdminController;
use app\controllers\PartnersController;
use app\controllers\SiteController;
use app\controllers\UserController;
use app\core\App ;
use app\models\User;

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'userClass' => User::class,
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

$app->router->get('/dons', [SiteController::class,'dons']);
$app->router->get('/benevolat', [SiteController::class,'benevolat']);


$app->router->get('/partners', [SiteController::class,'partners']);
$app->router->post('/partners', [SiteController::class,'partners']);

$app->router->get('/news', [SiteController::class,'news']);
$app->router->get('/tablePartners', [PartnersController::class,'partnersTable']);

$app->router->get('/profile', [UserController::class,'profile']);
$app->router->get('/editProfile', [UserController::class,'editProfile']);
$app->router->post('/editProfile', [UserController::class,'editProfile']);

$app->router->get('/dashboard',[UserController::class,'dashboard']);

$app->router->get('/discount',[UserController::class,'discount']);
$app->router->post('/discount',[UserController::class,'discount']);

$app->router->get('/partnersUser',[UserController::class,'partnersUser']);
$app->router->post('/partnersUser',[UserController::class,'starPartner']);
//$app->router->get('/partnersUserStarred',[UserController::class,'partnersUserStarred']);

$app->router->get('/UserManage',[AdminController::class,'UserManage']);


$app->router->get('/UserManage',[AdminController::class,'PartnerManage']);


$app->router->get('/UserManage',[AdminController::class,'CardManage']);



$app->run();

