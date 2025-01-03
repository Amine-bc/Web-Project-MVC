<?php

namespace app\models;

use app\core\db\DbModel;

class SubscriptionPayments extends DbModel
{


    public static function tableName(): string
    {
     return "SubscriptionPayments" ;
    }
}