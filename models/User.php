<?php

namespace app\models;

use app\core\UserModel;

class User extends UserModel
{
    public int $user_id = 0; // Matches 'user_id' in the table
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $confirm_password = '';
    public string $role = 'member'; // Default role
    public ?string $phone = null;
    public ?string $address = null;
    public ?string $profile_photo = null;
    public ?string $photo_identity = null;
    public ?string $payment_proof = null;
    public ?string $subscription_type = null;
    public string $subscription_status = 'active'; // Default status
    public string $join_date = ''; // Will use default in DB
    public ?string $expiration_date = null;

    public static function tableName(): string
    {
        return 'Users';
    }

       public function attributes(): array
    {
        return [
            'name',
            'email',
            'password',
            'role',
            'phone',
            'address',
            'profile_photo',
            'subscription_type',
            'subscription_status',
            'join_date',
            'expiration_date',
            'photo_identity',
            'payment_proof'
        ];
    }

    public function labels(): array
    {
        return [
            'name' => 'Full Name',
            'email' => 'Email',
            'password' => 'Password',
            'passwordConfirm' => 'Password Confirm',
            'role' => 'Role',
            'phone' => 'Phone Number',
            'address' => 'Address',
            'profile_photo' => 'Profile Photo',
            'subscription_type' => 'Subscription Type',
            'subscription_status' => 'Subscription Status',
            'join_date' => 'Join Date',
            'expiration_date' => 'Expiration Date'
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

        // Set default values where necessary

        $this->role = $this->role ?: 'member';
        $this->subscription_status = $this->subscription_status ?: 'active';
        $this->join_date = date('Y-m-d H:i:s');
        $this->expiration_date = date('Y-m-d H:i:s', strtotime('+' . 100 . ' days'));
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
