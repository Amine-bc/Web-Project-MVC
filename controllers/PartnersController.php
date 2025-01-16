<?php
namespace app\controllers;

use app\core\App;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\middlewares\PartnerMiddleware;
use app\core\Request;
use app\core\Utils;
use app\models\Partners;
use app\models\Users;

class PartnersController extends Controller
{
    public function __construct(){



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
        return false;

    }
public function PartnerProfile(){
        $partner_id = App::$app->session->get("user");
        $partner = Partners::findWhere(['partner_id' => $partner_id]);
        return $this->renderViewOnly('PartnerProfile',['partner'=>$partner]);
}
    public function PartnerDashboard(){
        return $this->renderViewOnly('PartnerDashboard');
    }


    public function PartnerCard(){
        //TODO: generate qr code here


        $partner_id = App::$app->session->get('user');
        $partner = Partners::findWhere(['partner_id' => $partner_id]);
        $partnerName = $partner[0]['name'];
        $path_qr = "/images/data/qr_code/5b7c617c9eb680aabfe1b269a0e247900c8d431002d3f675713f872eee28d3e7.png" ;
        return $this->renderViewOnly('PartnerCard', ['partnerName' => $partnerName, 'path_qr' => $path_qr]);
    }
    public function CheckUsers(Request $request){
        if ($request->isGet()){

            $this->renderViewOnly('PartnerDashboard');

        }
        if ($request->isPost()){
            $email = $request->getBody()['email'];
            $user = Users::findOneObject(['email'=> $email ]);
            $partner_id = App::$app->session->get('user');
            $partner = Partners::findWhere(['partner_id' => $partner_id]);

            echo json_encode([
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
               'subtype' => $user->subscription_type
                 //   'subtype' =>'test'
                ],
                'partner' => [
                 'name' => $partner[0]['reduction_'.lcfirst($user->subscription_type)],
                ]
            ]);
            // if user not with them skip
          //  $found = $user->exists( App::$app->session->get('user') );

        }
    }

}