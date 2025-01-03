<?php

namespace app\models;

use app\core\db\DbModel;

class Donations extends DbModel
{

    public static function tableName(): string
    {
       return 'Donations';
    }
}