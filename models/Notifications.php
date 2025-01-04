<?php

namespace app\models;

use app\core\db\DbModel;

class Notifications extends DbModel
{

    public static function tableName(): string
    {
        return 'notifications';
    }
    public function findNotif($userId){
        $notifications = Notifications::findOne(['user_id' => $userId]);
        return $notifications;
    }
}