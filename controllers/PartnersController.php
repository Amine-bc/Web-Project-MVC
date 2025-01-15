<?php
namespace app\controllers;

use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\middlewares\PartnerMiddleware;
use app\core\Request;
use app\models\Partners;

class PartnersController extends Controller
{
    public function __construct(){
        $this->registerMiddleware( new PartnerMiddleware('PartnerDashboard') );

    }
    public function partnersTable(Request $request){

        $page  = 0 ;
        if($request->getBody()['page'] > 1){
           $page = $request->getBody()['page'] - 1 ;
        }
        $model = new Partners();
        $advantagesfromDb = $model->findFirst(10, $page*10);
        $advantages = array_map(function ($item) {
            return [
                "name" => $item["name"],
                "category" => $item["category"],
                "city" => $item["city"],
                "reduction" => $item["discount"],
            ];
        }, $advantagesfromDb);
    return $this->render('partnersTable', ['advantages' => $advantages]);
    }


    public function partnersPage(Request $request){
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

    public function login(array $partner, Request $request)
    {

        $passwordFromDb = $partner[0]['password'];
        $password = $request->getBody()['password'];
        $hashedPassword = hash("sha256", $password);
        if( $hashedPassword == $passwordFromDb ){
            return true ;
        }

    }

    public function PartnerDashboard(){
        return $this->render('PartnerDashboard');
    }
}