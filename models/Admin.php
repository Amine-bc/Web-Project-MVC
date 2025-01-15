<?php

namespace app\models;

use app\core\UserModel;
use PDO;

class Admin extends UserModel
{
    public int $id ; // Matches 'user_id' in the table
    public string $email = '';
    public string $password = '';

    public static function tableName(): string
    {
        return 'admin';
    }

       public function attributes(): array
    {
        return [
            'id',
            'email',
            'password',
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Password',
            'passwordConfirm' => 'Password Confirm',
        ];
    }

    public function rules()
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8]],
            'confirm_password' => [[self::RULE_MATCH, 'match' => 'password']],
            'role' => [self::RULE_REQUIRED],
        ];
    }

    public function save()
    {
        // Hash the password before saving
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

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
