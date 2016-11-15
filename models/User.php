<?php

namespace app\models;

use Yii;

class User
{
    public static $nick;
    public static $email;
    public static $password;
    public static $firstname;
    public static $lastname;

    public static $guest = true;

    public static function setUserData($nick, $email, $password, $firstname, $lastname)
    {

        self::$email = $email;
        self::$firstname = $firstname;
        self::$lastname = $lastname;
        self::$nick = $nick;
        self::$password = $password;

    }

    public static function getUserData()
    {
        $data = "email : ".self::$email."<br>"
            ."nick : ".self::$nick."<br>"
            ."password : ".self::$password."<br>"
            ."first name : ".self::$firstname."<br>"
            ."last name : ".self::$lastname;

        return $data;
    }

    public static function clearUserData()
    {
        self::$email = '';
        self::$firstname = '';
        self::$lastname = '';
        self::$nick = '';
        self::$password = '';
        self::$guest = true;
    }

    public static function updateUserData($nick)
    {
        $users = new Users();
        $data = $users::find()
            ->where(['nick' => $nick])
            ->one();

        self::$email = $data['email'];
        self::$firstname = $data['firstname'];
        self::$lastname = $data['lastname'];
        self::$nick = $data['nick'];
        self::$password = $data['password'];
    }

}
