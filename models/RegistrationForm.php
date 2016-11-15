<?php

namespace app\models;

use yii;
use yii\base\Model;


class RegistrationForm extends Model
{
    public $nick;
    public $email;
    public $password;
    public $password_repeat;

    public function rules() {
        return [
            [['nick', 'email', 'password', 'password_repeat'], 'required'],
            ['email', 'email']
        ];
    }

    public function signup() {
        $users = new Users();
        $users->nick = User::$nick;
        $users->email = User::$email;
        $users->password = User::$password;

        return $users->save();
    }

    public function checkUserNickInDB()
    {
        $users = new Users();

        $check = $users::find()
            ->where(['nick' => User::$nick])
            ->count();
        if($check == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEquilPasswod($password, $repeat_password)
    {
        if($password === $repeat_password) {
            return true;
        } else {
            return false;
        }
    }
}
