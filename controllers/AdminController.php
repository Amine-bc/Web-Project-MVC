<?php

namespace app\controllers;

use app\core\Controller;
use app\core\middlewares\AdminMiddleware;
use app\models\Admin;
use app\models\Donations;
use app\models\Notifications;
use app\models\Partners;
use app\models\SubscriptionPayments;
use app\models\User;
use app\models\Volunteering;

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
    public function managePartners($request)
    {
        if ($request->isGet()) {
            $class = Partners::class;
            $content = $class::findAll();
            $stats = Partners::stats();
            if (!empty($content)) {
                $data = $content[0];
                $labels = [];

                // Loop through the first row and extract field names, excluding 'password'
                foreach ($data as $field => $value) {
                    if (is_string($field) && $field !== 'password') {
                        $labels[] = $field;
                    }
                }

                // Filter out the password column from the content data
                foreach ($content as &$row) {
                    unset($row['password']); // Remove the 'password' column from each row
                }

                return $this->renderViewOnly('VisAdmin', ['labels' => $labels, 'content' => $content, 'Vis'=>'Partners', 'stats' => $stats]);
            }
        }


    }
//    public function manageMembers($request)
//    {
//
//    }
    public function manageDonations($request)
    {
        if ($request->isGet()) {
            $class = Donations::class;
            $content = $class::findAll();

            if (!empty($content)) {
                $data = $content[0];
                $labels = [];

                // Loop through the first row and extract field names, excluding 'password'
                foreach ($data as $field => $value) {
                    if (is_string($field) && $field !== 'password') {
                        $labels[] = $field;
                    }
                }

                // Filter out the password column from the content data
                foreach ($content as &$row) {
                    unset($row['password']); // Remove the 'password' column from each row
                }

                return $this->renderViewOnly('VisAdmin', ['labels' => $labels, 'content' => $content, 'Vis'=>'Donations']);
            }
        }

    }
    public function manageVolunteers($request)
    {
        if ($request->isGet()) {
            $class = Volunteering::class;
            $content = $class::findAll();

            if (!empty($content)) {
                $data = $content[0];
                $labels = [];

                // Loop through the first row and extract field names, excluding 'password'
                foreach ($data as $field => $value) {
                    if (is_string($field) && $field !== 'password') {
                        $labels[] = $field;
                    }
                }

                // Filter out the password column from the content data
                foreach ($content as &$row) {
                    unset($row['password']); // Remove the 'password' column from each row
                }

                return $this->renderViewOnly('VisAdmin', ['labels' => $labels, 'content' => $content, 'Vis'=>'Volunteers']);
            }
        }

    }

    public function manageNotifications($request)
    {
        if ($request->isGet()) {
            $class = Notifications::class;
            $content = $class::findAll();

            if (!empty($content)) {
                $data = $content[0];
                $labels = [];

                // Loop through the first row and extract field names, excluding 'password'
                foreach ($data as $field => $value) {
                    if (is_string($field) && $field !== 'password') {
                        $labels[] = $field;
                    }
                }

                // Filter out the password column from the content data
                foreach ($content as &$row) {
                    unset($row['password']); // Remove the 'password' column from each row
                }

                return $this->renderViewOnly('VisAdmin', ['labels' => $labels, 'content' => $content, 'Vis'=>'Notifications']);
            }
        }

    }

    public function manageUsers($request)
    {
        if ($request->isGet()) {
            $class = User::class;
            $content = $class::findAll();

            if (!empty($content)) {
                $data = $content[0];
                $labels = [];

                // Loop through the first row and extract field names, excluding 'password'
                foreach ($data as $field => $value) {
                    if (is_string($field) && $field !== 'password') {
                        $labels[] = $field;
                    }
                }

                // Filter out the password column from the content data
                foreach ($content as &$row) {
                    unset($row['password']); // Remove the 'password' column from each row
                }

                return $this->renderViewOnly('VisAdmin', ['labels' => $labels, 'content' => $content, 'Vis'=>'Users']);
            }
        }

    }
    public function managePayments($request)
    {
        if ($request->isGet()) {
            $class = SubscriptionPayments::class;
            $content = $class::findAll();

            if (!empty($content)) {
                $data = $content[0];
                $labels = [];

                // Loop through the first row and extract field names, excluding 'password'
                foreach ($data as $field => $value) {
                    if (is_string($field) && $field !== 'password') {
                        $labels[] = $field;
                    }
                }

                // Filter out the password column from the content data
                foreach ($content as &$row) {
                    unset($row['password']); // Remove the 'password' column from each row
                }

                return $this->renderViewOnly('VisAdmin', ['labels' => $labels, 'content' => $content, 'Vis'=>'Payments']);
            }
        }

    }
    public function manageAdmin($request)
    {
        if ($request->isGet()) {
            $class = Admin::class;
            $content = $class::findAll();

            if (!empty($content)) {
                $data = $content[0];
                $labels = [];

                // Loop through the first row and extract field names, excluding 'password'
                foreach ($data as $field => $value) {
                    if (is_string($field) && $field !== 'password') {
                        $labels[] = $field;
                    }
                }

                // Filter out the password column from the content data
                foreach ($content as &$row) {
                    unset($row['password']); // Remove the 'password' column from each row
                }

                return $this->renderViewOnly('VisAdmin', ['labels' => $labels, 'content' => $content, 'Vis'=>'Admin']);
            }
        }


    }
    public function login($admin,$request){

        $passwordFromDb = $admin[0]['password'];
        $password = $request->getBody()['password'];
        $hashedPassword = hash("sha256", $password);
        if( $hashedPassword == $passwordFromDb ){
            return true ;
        }
        return false;

    }
}
