<?php

namespace app\models;

use app\core\db\DbModel;

class Partners extends DbModel
{
    public array $Partners =[];
    public static function tableName(): string
    {
        return 'partners';
    }
    public function setPartners(){
            $this->Partners = self::findAll();
            $_SESSION['partners'] = $this->Partners;
    }
    public function applyFilter($filter){
        if(isset($_SESSION['partners']) && empty($this->Partners)){
            $this->Partners = $_SESSION['partners'];
            //var_dump($this->Partners);
        }
        $filteredPartners = [] ;
        if(!empty($this->Partners) and !empty($filter)){
            foreach($this->Partners as $partner){
                foreach($filter as $field => $value){
                    if($partner[$field] == $value){
                        $filteredPartners[] = $partner;
                    }
                }
            }
        }else{
            return $this->Partners;
        }
        return $filteredPartners;
    }
    public function rules(): array
    {
        return [];
    }

}