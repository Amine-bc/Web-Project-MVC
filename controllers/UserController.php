<?php

namespace app\controllers;

use app\core\App;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\core\Utils;
use app\models\Donations;
use app\models\SubscriptionPayments;
use app\models\User;
use app\models\Volunteering;

class UserController extends Controller{
        public function __construct()
        {
            $this->registerMiddleware(new AuthMiddleware(['profile']));
            $this->registerMiddleware(new AuthMiddleware(['editProfile']));
        }

    public function register(Request $request){
        $registerModel = new User();

        if ($request->getMethod() === 'post') {
            // Load form data into the model
            $registerModel->loadData($request->getBody());
            // Handle file uploads for profile photo, if any
            $list = ['profile_photo','payment_proof','photo_identity'];
            foreach ($list as $item) {
                if (isset($_FILES[$item]) && $_FILES[$item]['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = App::$ROOT_DIR.'/public/images/data/'.$item; // Define the upload directory
                    $filename = uniqid() . '_' . basename($_FILES[$item]['name']);
                    $targetFile = $uploadDir . '/'.$filename;
                    if (move_uploaded_file($_FILES[$item]['tmp_name'], $targetFile)) {
                        $registerModel->{$item} = $filename;
                    } else {
                        $registerModel->addError('profile_photo', 'Failed to upload profile photo');
                    }
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
    public function login(Request $request,$model){
        var_dump($model);
        $user = User::findOneObject(['email' => $model->email]);
        var_dump($user);

        if (!$user) {
            $model->addError('email', 'User does not exist with this email address');
            return false;
        }

        if (!password_verify($model->password, $user->password)) {
            $model->addError('password', 'Password is incorrect');
            return false;
        }
        return App::$app->login($user);

}

    public function profile(Request $request){
        $userId = App::$app->session->get('user') ?? null;
        $user = User::findOneObject(['user_id' => $userId]);
        $donations = DONATIONS::findOne(['user_id' => $userId]);
        $subscriptions = SubscriptionPayments::findOne(['user_id' => $userId]);
        $volunteering = Volunteering::findOne(['user_id' => $userId]);
        return $this->render('profile', ['user'=>$user, 'donations'=> $donations, 'subscriptions'=>$subscriptions, 'volunteering'=>$volunteering]);
}

    public function editProfile(Request $request){
        if ($request->isGet()) {

            $userId = App::$app->session->get('user') ?? null;
            $user = User::findOneObject(['user_id' => $userId]);

            return $this->render('editProfile', ['user'=>$user]);

        }elseif ($request->isPost()) {
            $attributes = [];
            $registerModel = new User();

            foreach ($request->getBody() as $key => $value) {
                    $attributes[$key] = $value ;
            }
           var_dump($attributes);
            $userId = App::$app->session->get('user') ?? null;

            var_dump($registerModel->validate_subset([],$attributes));
            var_dump($registerModel->errors);

            if ($registerModel->validate_subset([],$attributes) && $registerModel->updateRows($attributes, ['user_id' => $userId])) {
                App::$app->session->setFlash('success', 'Thanks for registering');
                var_dump($registerModel);
                (new Response())->redirect('/profile');
            }

        }
}

}