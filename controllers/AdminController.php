<?php

namespace app\controllers;

use app\core\Controller;
use app\core\middlewares\AdminMiddleware;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AdminMiddleware(['AdminDashboard']));
        $this->registerMiddleware(new AdminMiddleware(['UserManage']));
        $this->registerMiddleware(new AdminMiddleware(['PartnersManage']));
        $this->registerMiddleware(new AdminMiddleware(['CardManage']));

    }

    public function adminDashboard()
    {

        return $this->renderViewOnly('AdminDashboard', []);
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

    public function login($admin,$request){

        $passwordFromDb = $admin[0]['password'];
        $password = $request->getBody()['password'];
        $hashedPassword = hash("sha256", $password);
        if( $hashedPassword == $passwordFromDb ){
            return true ;
        }

    }
}
