<?php

namespace app\controllers;

use app\core\App;
use app\core\Controller;
use app\core\Request;
use app\core\Utils;
use app\models\User;

class UserController extends Controller
{

    public function register(Request $request){
        $registerModel = new User();

        if ($request->getMethod() === 'post') {
            // Load form data into the model
            $registerModel->loadData($request->getBody());

            // Handle file uploads for profile photo, if any
            if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = '/path/to/uploads/'; // Define the upload directory
                $filename = uniqid() . '_' . basename($_FILES['profile_photo']['name']);
                $targetFile = $uploadDir . $filename;

                if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $targetFile)) {
                    $registerModel->profile_photo = $filename;
                } else {
                    $registerModel->addError('profile_photo', 'Failed to upload profile photo');
                }
            }
            // var_dump($registerModel->validate());
            // If validation passes and the user is saved successfully
            if ($registerModel->validate() && $registerModel->save()) {
                App::$app->session->setFlash('success', 'Thanks for registering');
                $text = $registerModel->email ;
                Utils::generateQRcode($text,App::$ROOT_DIR.'/public/images') ;
                return $this->render('WelcomeNewUser', [
                    'name' => $registerModel->name, 'email' => $registerModel->email, 'path' => '/images/qrcode.png'
                ]);
            }

        }

        // Render the registration form with errors (if any)
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);

    }

}