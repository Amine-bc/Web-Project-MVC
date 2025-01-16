<?php

namespace app\models;

use app\core\db\DbModel;
use app\core\UserModel;
use PDO;

class Offers extends DbModel
{
    public int $id ; // Matches 'user_id' in the table
    public string $email = '';
    public string $password = '';

    public static function tableName(): string
    {
        return 'Offers';
    }

       public function attributes(): array
    {
        return [

        ];
    }

    public function labels(): array
    {
        return [

        ];
    }

    public function rules()
    {
        return [

        ];
    }

    public function save()
    {

        return parent::save();
    }

//    public function updateRows(array $attributes, array $conditions = []){
//
//
//       return true;
//    }
    public function getDisplayName(): string
    {
        return $this->name;
    }


}
