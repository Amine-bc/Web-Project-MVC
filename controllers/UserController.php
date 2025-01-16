<?php

namespace app\controllers;

use app\core\App;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\core\Router;
use app\core\Utils;
use app\models\Admin;
use app\models\Cards;
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
            $this->registerMiddleware(new AuthMiddleware(['Card']));

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
            $admin = Admin::findWhere(['email' => $model->email]);
            $adminController = new AdminController();

        if ($admin && $adminController->login($admin, $request) ) {
            App::$app->session->set('user', $admin[0]['id']);
            App::$app->session->set('role', 'admin');
            $userAdmin = new User();
            App::$app->user = $userAdmin;
            return true ;
        }

        $user = User::findOneObject(['email' => $model->email]);
        $partner = Partners::findWhere(['email' => $model->email]);

        $partnerController = new PartnersController();


        if( $partner && $partnerController->login($partner, $request) ) {
            App::$app->session->set('user', $partner[0]['partner_id']);
            App::$app->session->set('role', 'partner');
            $user = new User();
            App::$app->user = $user;
            return true ;
        }
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

public function dashboard()
    {
        $userId = App::$app->user->user_id ;
        $where = ['user_id' => $userId];
        $user = User::findOneObject(['user_id' => $userId]);

        $donationsfromDb = DONATIONS::findWhereinTableJoin(
            $where,
            'user_donation',
            'donation_id',
            'user_id'
        );

       $donations = array_map(function ($item) {
           return [
               "donated_amount" => $item["donated_amount"],
               "donation_date" => $item["donation_date"],
               "recipient_organization" => $item["recipient_organization"],
               "recipient_need" => $item["recipient_need"],
           ];
       }, $donationsfromDb);



       // $volunteering = Volunteering::findAll();


        $volunteeringfromDb = Volunteering::findWhereinTableJoin(
            $where,
            'User_Volunteering',
            'volunteer_id',
            'user_id'
        );

        $volunteering = array_map(function ($item) {
            return [
             "event_name" => $item["event_name"],
             "participation_date" => $item["participation_date"],
                "description" => $item["description"],
            ];
        }, $volunteeringfromDb);





        $subscriptions = SubscriptionPayments::findWhere(['user_id' => $userId]);
        $notifications = (new Notifications() )->findNotif($userId);
        return $this->render('dashboard',['user'=>$user,'notifications'=>$notifications,  'donations'=> $donations, 'subscriptions'=>$subscriptions, 'volunteering'=>$volunteering]);
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
        $SubType = 'reduction_' . lcfirst(App::$app->user->subscription_type);
        return [
            "name" => $item["name"],
            "category" => $item["category"],
            "city" => $item["city"],
            "reduction" => $item[$SubType] ??  $item['discount'] ,
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

public function Card(Request $request){
            if($request->isGet()){

                $cards = Cards::findAll();
                return $this->render('Cards',['cards'=>$cards]);
            }

            if($request->isPost()){
                $newSub = $request->getBody()['subscription'];
                $result = App::$app->user->changeSubscription($newSub);
                (new Response())->redirect('/dashboard');
            }
}

public function dons(Request $request)
{
    if($request->isGet()){
        $user_id = App::$app->user->user_id ;
        $where =   ['user_id' => $user_id] ;

        $donationsfromDb = DONATIONS::findWhereinTableJoin(
            $where,
            'user_donation',
            'donation_id',
            'user_id'
        );

        $donations = array_map(function ($item) {
            return [
                "donated_amount" => $item["donated_amount"],
                "donation_date" => $item["donation_date"],
                "recipient_organization" => $item["recipient_organization"],
                "recipient_need" => $item["recipient_need"],
            ];
        }, $donationsfromDb);


        $donsfromdb = Donations::findAll();
        $dons = array_map(function ($item) {
            return [
                'donation_id' => $item['donation_id'],             // Unique ID of the donation
                'recipient_need' => $item['recipient_need'],       // Purpose or need
                'required_amount' => $item['required_amount'],     // Required donation amount
                'cib_code' => $item['cib_code'],                  // CIB Code for fund transfer
                'ccp_code' => $item['ccp_code'],                  // CCP Code for fund transfer
                'assistance_details' => $item['assistance_details'], // Detailed description
                'contact_email' => $item['contact_email'],        // Contact email for the donation
                'contact_phone' => $item['contact_phone'],        // Contact phone number
                'creation_date' => $item['creation_date'],        // When this record was created
                'last_update' => $item['last_update'],
                'short_description' => $item['short_description'],
                // When this record was last updated
            ];
        }, $donsfromdb); // Assuming $data contains the fetched rows from the database
        return $this->render('DonsUser',['dons'=>$dons,'donations'=>$donations]);



    }
    if($request->isPost()){
        $donId = $request->getBody()['donation_id'];
        $donFromDb  = Donations::findWhere(['donation_id'=>$donId]);
        $don = array_map(function ($item) {
            return [
                'donation_id' => $item['donation_id'],             // Unique ID of the donation
                'recipient_need' => $item['recipient_need'],       // Purpose or need
                'required_amount' => $item['required_amount'],     // Required donation amount
                'cib_code' => $item['cib_code'],                  // CIB Code for fund transfer
                'ccp_code' => $item['ccp_code'],                  // CCP Code for fund transfer
                'assistance_details' => $item['assistance_details'], // Detailed description
                'contact_email' => $item['contact_email'],        // Contact email for the donation
                'contact_phone' => $item['contact_phone'],        // Contact phone number
                'creation_date' => $item['creation_date'],        // When this record was created
                'last_update' => $item['last_update'],
                'short_description' => $item['short_description'],
                // When this record was last updated
            ];
        }, $donFromDb);
        return $this->render('Don',['don'=>$don[0],'getback'=> '/donsUser']);
    }

}

public function volunteering(){

}
}