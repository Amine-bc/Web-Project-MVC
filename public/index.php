<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once '../core/App.php';

use app\controllers\AdminController;
use app\controllers\PartnersController;
use app\controllers\SiteController;
use app\controllers\UserController;
use app\core\App ;
use app\models\Users;

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'userClass' => Users::class,
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
$app->router->post('/dons', [SiteController::class,'dons']);

$app->router->get('/AskDonation', [SiteController::class,'AskDon']);
$app->router->post('/AskDonation', [SiteController::class,'AskDon']);

$app->router->get('/benevolat', [SiteController::class,'benevolat']);
$app->router->post('/benevolat', [SiteController::class,'benevolat']);

$app->router->get('/Partner', [SiteController::class,'partner']);

$app->router->get('/partners', [SiteController::class,'partners']);
$app->router->post('/partners', [SiteController::class,'partners']);

$app->router->get('/advantages', [SiteController::class,'advantages']);


$app->router->get('/news', [SiteController::class,'news']);
$app->router->post('/news', [SiteController::class,'news']);

$app->router->get('/Card',[UserController::class,'Card']);
$app->router->post('/Card',[UserController::class,'Card']);

$app->router->get('/tablePartners', [PartnersController::class,'partnersTable']);

$app->router->get('/profile', [UserController::class,'profile']);
$app->router->get('/editProfile', [UserController::class,'editProfile']);
$app->router->post('/editProfile', [UserController::class,'editProfile']);

$app->router->get('/dashboard',[UserController::class,'dashboard']);

$app->router->get('/discount',[UserController::class,'discount']);
$app->router->post('/discount',[UserController::class,'discount']);

$app->router->get('/partnersUser',[UserController::class,'partnersUser']);
$app->router->post('/partnersUser',[UserController::class,'starPartner']);

$app->router->get('/donsUser', [UserController::class,'dons']);
$app->router->post('/donsUser', [UserController::class,'dons']);



//$app->router->get('/partnersUserStarred',[UserController::class,'partnersUserStarred']);

$app->router->get('/AdminDashboard',[AdminController::class,'adminDashboard']);

$app->router->get('/managePartners',[AdminController::class,'managePartners']);
$app->router->get('/manageMembers',[AdminController::class,'manageMembers']);
$app->router->get('/manageDonations',[AdminController::class,'manageDonations']);
$app->router->get('/manageNotifications',[AdminController::class,'manageNotifications']);
$app->router->get('/manageVolunteers',[AdminController::class,'manageVolunteers']);
$app->router->get('/manageUsers',[AdminController::class,'manageUsers']);
$app->router->get('/managePayments',[AdminController::class,'managePayments']);
$app->router->get('/manageAdmin',[AdminController::class,'manageAdmin']);
$app->router->get('/manageNews',[AdminController::class,'manageNews']);



$app->router->post('/deleteItem',[AdminController::class,'deleteItem']);
$app->router->post('/editItem',[AdminController::class,'editItem']);
$app->router->get('/manageCards',[AdminController::class,'manageCards']);
$app->router->get('/manageOffers',[AdminController::class,'manageOffers']);
$app->router->get('/settings',[AdminController::class,'settings']);

$app->router->get('/addElement',[AdminController::class,'addElement']);
$app->router->post('/addElement',[AdminController::class,'addElement']);

$app->router->get('/validate',[AdminController::class,'validate']);




$app->router->get('/PartnerDashboard',[PartnersController::class,'PartnerDashboard']);

$app->router->get('/PartnerProfile',[PartnersController::class,'PartnerProfile']);

$app->router->get('/CheckUsers',[PartnersController::class,'CheckUsers']);
$app->router->get('/PartnerCard',[PartnersController::class,'PartnerCard']);


$app->router->post('/CheckUsers',[PartnersController::class,'CheckUsers']);

$app->router->post('/CheckUsers',[PartnersController::class,'CheckUsers']);


$app->run();



