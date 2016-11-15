<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $uname;
    public $email;
    public $password;

    public function rules() {
        return [
            [['uname', ''], 'required'],
            [['email', 'email'], 'required'],
            [['password', ''], 'required']
        ];
    }
}