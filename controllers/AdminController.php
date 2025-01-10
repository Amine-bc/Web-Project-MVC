<?php

namespace app\controllers;

use app\core\Controller;
use app\core\middlewares\AdminMiddleware;

class AdminController extends Controller
{
    public function __construct()
    {

        $this->registerMiddleware(new AdminMiddleware(['UserManage']));
        $this->registerMiddleware(new AdminMiddleware(['PartnersManage']));
        $this->registerMiddleware(new AdminMiddleware(['CardManage']));

    }
    public function UserManage($request)
    {

    }
    public function PartnerManage($request)
    {

    }
    public function CardManage($request)
    {

    }
}