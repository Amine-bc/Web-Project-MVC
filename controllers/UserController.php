<?php

namespace app\controllers;

use app\core\App;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\core\Router;
use app\core\Utils;
use app\models\Donations;
use app\models\Notifications;
use app\models\Partners;
use app\models\SubscriptionPayments;
use app\models\User;
use app\models\Volunteering;

class UserController extends Controller{
        public function __construct()
        {
            $this->registerMiddleware(new AuthMiddleware(['profile']));
            $this->registerMiddleware(new AuthMiddleware(['editProfile']));
            $this->registerMiddleware(new AuthMiddleware(['partnersUserStarred']));
            $this->registerMiddleware(new AuthMiddleware(['editProfile']));
            $this->registerMiddleware(new AuthMiddleware(['partnersUser']));
            $this->registerMiddleware(new AuthMiddleware(['dashboard']));
            $this->registerMiddleware(new AuthMiddleware(['partnersUser']));
            $this->registerMiddleware(new AuthMiddleware(['partnersUserStarred']));
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
            if ($registerModel->validate()) {
                App::$app->session->setFlash('success', 'Thanks for registering');
                $text = $registerModel->email ;
                $path_qr = Utils::generateQRcode($text,App::$ROOT_DIR.'/public/images/data/qr_code/') ;
                $registerModel->qr_code = $path_qr;
                $registerModel->save() ;
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
        if ($model->email == 'admin@admin.com' && $model->password == 'admin' ){
            App::$app->session->set('user', 0);
            var_dump('admin');
            $userAdmin = new User();
            App::$app->user = $userAdmin;
            return true ;
        }
        $user = User::findOneObject(['email' => $model->email]);

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
        $donations = DONATIONS::findAll();
        $subscriptions = SubscriptionPayments::findWhere(['user_id' => $userId]);
        $volunteering = Volunteering::findAll();
        return $this->render('profile', ['user'=>$user, 'donations'=> $donations, 'subscriptions'=>$subscriptions, 'volunteering'=>$volunteering]);
}

    public function editProfile(Request $request){
        if ($request->isGet()) {

            $userId = App::$app->user->user_id ;
            $user = User::findOneObject(['user_id' => $userId]);

            return $this->render('editProfile', ['user'=>$user]);

        }elseif ($request->isPost()) {
            $attributes = [];
            $registerModel = new User();

            foreach ($request->getBody() as $key => $value) {
                    $attributes[$key] = $value ;
            }
            $userId = App::$app->user->user_id ;

            var_dump($registerModel->validate_subset([],$attributes));
            var_dump($registerModel->errors);

            if ($registerModel->validate_subset([],$attributes) && $registerModel->updateRows($attributes, ['user_id' => $userId])) {
                App::$app->session->setFlash('success', 'Thanks for registering');
                var_dump($registerModel);
                (new Response())->redirect('/profile');
            }

        }
}

public function dashboard()
{
    $userId = App::$app->user->user_id ;

    $user = User::findOneObject(['user_id' => $userId]);

    $notifications = (new Notifications() )->findNotif($userId);
    return $this->render('dashboard',['user'=>$user,'notifications'=>$notifications]);
}

public function discount($request){
    $model = new Partners();

    if($request->isPost()){
        $SubType = 'reduction_' . lcfirst(App::$app->user->subscription_type);
        $model->setPartners();
        return $this->render('Discount',['partners'=>$model->Partners,'SubType'=>$SubType]);
    }
    if ($request->isGet()) {
        $filters = [] ;
        $city = isset($_GET['city']) ? $_GET['city'] : '';
        $category = isset($_GET['category']) ? $_GET['category'] : '';

        if ($city) $filters['city'] = $city;
        if ($category) $filters['category'] = $category;
        $partners = [];
        if(!isset($_SESSION['partners'])){
            $model->setPartners();

        }
        $partners = $model->applyFilter($filters);
        $SubType = 'reduction_' . lcfirst(App::$app->user->subscription_type);
        return $this->render('Discount',['partners'=>$partners,'SubType'=>$SubType]);
    }
}
public function starPartner(Request $request)
{
    $partner_id = ($request->getBody())['partner_id'];
    $user_id = App::$app->user->user_id ;
    $UserModel = new User();
    $res = $UserModel->addStar($partner_id, $user_id);
    return $this->partnersUser(new Request());
}
public function partnersUser(Request $request){
    $user_id = App::$app->user->user_id ;
    $where =   ['user_id' => $user_id] ;
    $advantagesfromDb = Partners::findWhereinTable(
                        $where,
        'User_Partners',
        'partner_id',
        'user_id'
    );

    $advantages = array_map(function ($item) {
        return [
            "name" => $item["name"],
            "category" => $item["category"],
            "city" => $item["city"],
            "reduction" => $item["discount"],
            "starred" => $item["starred"],
            "partner_id" => $item["partner_id"]
        ];
    }, $advantagesfromDb);
            return $this->render('partnersUser',['advantages'=>$advantages]);
}

public function partnersUserStarred (Request $request)
{
    $user_id = App::$app->user->user_id ;

    $where =   ['user_id' => $user_id, 'starred' => 1] ;
    $advantagesfromDb = Partners::findWhereinTable(
        $where,
        'User_Partners',
        'partner_id',
        'user_id'
    );

    $advantages = array_map(function ($item) {
        return [
            "name" => $item["name"],
            "category" => $item["category"],
            "city" => $item["city"],
            "reduction" => $item["discount"],
            "starred" => $item["starred"],
            "partner_id" => $item["partner_id"]
        ];
    }, $advantagesfromDb);
    return $this->render('partnersUser',['advantages'=>$advantages]);
}



public function volunteering(){

}
}