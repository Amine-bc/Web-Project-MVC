<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\Partners;

class PartnersController extends Controller
{
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
}