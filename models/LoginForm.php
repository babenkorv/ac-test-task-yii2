<?php

namespace app\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $nick;
    public $password;

    /**
     * set form rules
     * @return [type] [description]
     */
    public function rules()
    {
        return [
            [['nick', 'password'], 'required']
        ];
    }

    public function login() {
        $users = new Users();
        $data = $users::find()
            ->where(['nick' => User::$nick, 'password' => User::$password])
            ->count();

        if($data == 1 ) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserData()
    {
        $users = new Users();
        $data = $users::find()
            ->where(['nick' => User::$nick])
            ->one();

        User::$nick = $data['nick'];
        User::$email = $data['email'];
        User::$firstname = $data['firstname'];
        User::$lastname = $data['lastname'];
        User::$activeUser = true;
    }
}