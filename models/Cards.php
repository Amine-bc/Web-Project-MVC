<?php

namespace app\models;

use app\core\db\DbModel;

class Cards extends DbModel
{

    public static function tableName(): string
    {
       return 'subscription_cards';
    }
}