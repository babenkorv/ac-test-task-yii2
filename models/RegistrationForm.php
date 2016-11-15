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

    /**
     * set form rules
     */
    public function rules() {
        return [
            [['nick', 'email', 'password', 'password_repeat'], 'required'],
            ['email', 'email']
        ];
    }

    /**
     * registration user in database
     * @return [bool] [if user data add in database return true]
     */
    public function signup() {
        $users = new Users();
        $users->nick = User::$nick;
        $users->email = User::$email;
        $users->password = User::$password;

        return $users->save();
    }
    /**
     * checks whether the nickname is not available in the database
     * @return [bool] [return true if nick is empty
     *                 return false if nick available]
     */
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
    /**
     * 
     *check whether the password entered by the user match
     * @param  [string] $password        [user password]
     * @param  [string] $repeat_password [repeat user password]
     * @return [bool]   [return true if password is rquil, else return false]
     */
    public function checkEquilPasswod($password, $repeat_password)
    {
        if($password === $repeat_password) {
            return true;
        } else {
            return false;
        }
    }
}
