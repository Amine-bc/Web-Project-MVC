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
use app\models\User;

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

    public function login(Request $request)
    {
        //var_dump($request->getBody(), $request->getRouteParam('id'));
        $userModel = new User();
        $userController = new UserController();
        if ($request->getMethod() === 'post') {
            $userModel->loadData($request->getBody());
            if ($userController->login($request,$userModel)) {
                App::$app->response->redirect('/');
                (new Response())->redirect('profile');
                // set session
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

    public function news(Request $request){
        $model = new News();
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

    public function dons(Request $request){
        $modelDon = new Donations();
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

    public function benevolat(Request $request)
    {

    }
    public function newsPage(Request $request){

    }

    public function partnersPage(Request $request){

    }

}
