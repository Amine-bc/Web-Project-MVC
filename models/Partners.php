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
            foreach ($this->Partners as $partner) {
                $matchesAllConditions = true; // Start by assuming the partner matches all conditions

                foreach ($filter as $field => $value) {
                    // If any condition is not met, set $matchesAllConditions to false and break the loop
                    if ($partner[$field] != $value) {
                        $matchesAllConditions = false;
                        break; // No need to check the remaining conditions for this partner
                    }
                }

                // If all conditions matched, add the partner to the filtered list
                if ($matchesAllConditions) {
                    $filteredPartners[] = $partner;
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