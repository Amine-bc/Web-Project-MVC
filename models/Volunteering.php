<?php

namespace app\models;

use app\core\db\DbModel;

class Volunteering extends DbModel
{

    public static function tableName(): string
    {
    return 'Volunteering';
    }
}