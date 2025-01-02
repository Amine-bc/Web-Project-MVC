<?php

namespace app\models;

use app\core\db\DbModel;

class News extends DbModel
{
    public function populate()
    {

    }

    public function findFirst($limit,$offset)
    {
       return parent::findFirst(3,0) ;
    }

    public static function tableName(): string
    {
        return 'news';
    }
    public function rules(){
        return [];
    }

}