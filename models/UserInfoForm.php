<?php

namespace app\models;

use Yii;
use yii\base\Model;


class UserInfoForm extends Model
{
    public $nick;
    public $email;
    public $password;
    public $firstname;
    public $lastname;

    public function rules() {
        return [
            [['nick', 'email', 'password', 'firstname', 'lastname'], 'string'],
            ['email', 'email']
        ];
    }

    public function update($nick) {
    	$users = new Users();

        User::$nick = $nick;
    	$data = $users::find()
    		->where(['nick' => User::$nick])->One();

    	$data->email = User::$email;
    	$data->password = User::$password;
    	$data->firstname = User::$firstname;
    	$data->lastname = User::$lastname;

    	$data->update();

        User::updateUserData($nick);

    }
}

?>