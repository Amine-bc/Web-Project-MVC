<?php


namespace app\controllers;


use app\core\App;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\core\Utils;
use app\models\Donations;
use app\models\LoginForm;
use app\models\News;
use app\models\Partners;
use app\models\Users;
use app\models\Volunteering;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
        $this->registerMiddleware(new AuthMiddleware(['settings']));
    }

    public function home()
    {
        $modelPartners = new Partners();
        $advantagesfromDb = $modelPartners->findFirst(10,0);
        //exit;
        $modelNews = new News();
        $newsfromdb = $modelNews->findFirst('','');

        // Example array of news items
        $news = array_map(function ($item) {
            return [
                "id" => $item["id"],
                "title" => $item["title"],
                "description" => $item["description"],
                "image_path" => $item["image_path"],
                "created_at" => $item["created_at"],
            ];
        }, $newsfromdb);

        $advantages = array_map(function ($item) {
            return [
                "name" => $item["name"],
                "category" => $item["category"],
                "city" => $item["city"],
                "reduction" => $item["discount"],
            ];
        }, $advantagesfromDb);

        return $this->render('home', [
            'news' => $news, 'advantages' => $advantages
        ]);
    }


    public function advantages(Request $request){
        if ($request->isGet()){
            $advantagesfromDb = Partners::findAll();
            $advantages = array_map(function ($item) {
                return [
                    "name" => $item["name"],
                    "category" => $item["category"],
                    "city" => $item["city"],
                    "reduction" => $item["discount"],
                    "reduction_jeunes" => $item["reduction_jeunes"],
                    "reduction_classique" => $item["reduction_classique"],
                    "reduction_premium" => $item["reduction_premium"],
                ];
            }, $advantagesfromDb);

            return $this->render('advantages', ['advantages' => $advantages]);

        }
    }

    public function login(Request $request)
    {
        //var_dump($request->getBody(), $request->getRouteParam('id'));
        $userModel = new Users();
        $userController = new UserController();
        if ($request->getMethod() === 'post') {
            $userModel->loadData($request->getBody());


            if ($userController->login($request,$userModel)) {



                if (App::isAdmin()){
                    (new Response())->redirect('AdminDashboard');
                    exit;
                }
                if (App::isPartner()){
                    (new Response())->redirect('PartnerDashboard');
                    exit;
                }
                App::$app->session->set('role','member') ;
                (new Response())->redirect('profile');

            }
        }
        return $this->render('login', [
            'model' => $userModel
        ]);
    }

//    public function profile(Request $request){
//        $usercontroller = new UserController();
//        return $usercontroller->profile($request);
//    }

    public function register(Request $request)
    {
        $userController = new UserController();
       return $userController->register($request);
    }


    public function logout(Request $request, Response $response)
    {
        App::$app->logout();
        App::$app->response->redirect('/');

    }

    public function contact()
    {
        return $this->render('contact');
    }



    public function profileWithId(Request $request)
    {
        echo '<pre>';
        var_dump($request->getBody());
        echo '</pre>';
    }

    public function partners(Request $request){
        $partnersController = new PartnersController();
        return $partnersController->partnersPage($request);
    }

    public function partner(Request $request){
        $partner = Partners::findWhere(['partner_id'=>$request->getBody()['partner_id']]);
        return $this->render('Partner', ['partner' => $partner]);
    }

    public function news(Request $request){
       if ($request->isGet()){
           $newsfromdb = News::findAll();
           // Example array of news items
           $news = array_map(function ($item) {
               return [
                   "id" => $item["id"],
                   "title" => $item["title"],
                   "description" => $item["description"],
                   "image_path" => $item["image_path"],
                   "created_at" => $item["created_at"],
               ];
           }, $newsfromdb);
           return $this->render('News',['news'=>$news]);
       }

       if ($request->isPost()){
           $newsId = $request->getBody()['id'];
           $newsfromdb = News::findWhere(['id'=>$newsId]);
           $news = array_map(function ($item) {
               return [
                   "id" => $item["id"],
                   "title" => $item["title"],
                   "description" => $item["description"],
                   'created_at' => $item["created_at"],
                   'detailed_description' => $item["detailed_description"],
               ];
           },$newsfromdb);
           return $this->render('New',['new'=>$news[0]]);
       }

    }



    public function dons(Request $request){
        if($request->isGet()){

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
            return $this->render('Dons',['dons'=>$dons]);

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
           return $this->render('Don',['don'=>$don[0],'getback'=> '/dons']);
        }

    }

    public function benevolat(Request $request)
    {
        if($request->isGet()){
            $volunteerfromdb = Volunteering::findAll();
            $volunteers = array_map(function ($item) {
                return [
                  'event_name' =>  $item['event_name'] ,
                    'description' => $item['description'],
                    'participation_date' => $item['participation_date'],
                    'volunteer_id' => $item['volunteer_id'],
                ];
            }, $volunteerfromdb); // Assuming $data contains the fetched rows from the database
            return $this->render('benevolats',['volunteering'=>$volunteers]);
        }
        if($request->isPost()){
            $eventId = $request->getBody()['volunteer_id'];
            var_dump($eventId);
            $eventFromDb  = Volunteering::findWhere(['volunteer_id'=>$eventId]);
            $event = array_map(function ($item) {
                return [
                    'event_name' =>  $item['event_name'] ,
                    'description' => $item['description'],
                    'participation_date' => $item['participation_date'],
                    'volunteer_id' => $item['volunteer_id'],
                ];
            },$eventFromDb);
                var_dump($event);
                return $this->render('benevolat',['volunteer'=>$event[0]]);

        }
    }
    public function newsPage(Request $request){

    }

    public function partnersPage(Request $request){

    }

    public function AskDon (Request $request){
        if($request->isGet()){
          return   $this->render('DonationCase');
        }
        if($request->isPost()){

            $dons = $request->getBody();

            //TODO: add to db

        }

    }

}
