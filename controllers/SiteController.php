<?php
/**
 * User: TheCodeholic
 * Date: 7/8/2020
 * Time: 8:43 AM
 */

namespace app\controllers;


use app\core\App;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\News;
use app\models\Partners;
use app\models\User;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
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
        $loginForm = new LoginForm();
        if ($request->getMethod() === 'post') {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                Application::$app->response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
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
                App::$app->response->redirect('/');
                return 'Show success page';
            }
        }

        // Render the registration form with errors (if any)
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }


    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function contact()
    {
        return $this->render('contact');
    }

    public function profile()
    {
        return $this->render('profile');
    }

    public function profileWithId(Request $request)
    {
        echo '<pre>';
        var_dump($request->getBody());
        echo '</pre>';
    }

    public function partners(Request $request){
        $model = new Partners();
        if($request->isGet()){
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

            return $this->render('Partners',['partners'=>$partners]);
        }
        if($request->isPost()){
            $model->setPartners();
            return $this->render('Partners',['partners'=>$model->Partners]);
        }
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
}
