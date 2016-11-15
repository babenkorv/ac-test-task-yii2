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
    /**
     * ustanavlivet information about the currently logged on user
     * @param [string] $nick      [user nick]
     * @param [string] $email     [user email]
     * @param [string] $password  [user password]
     * @param [string] $firstname [user firstname]
     * @param [string] $lastname  [user lastname]
     */
    public static function setUserData($nick, $email, $password, $firstname, $lastname)
    {

        self::$email = $email;
        self::$firstname = $firstname;
        self::$lastname = $lastname;
        self::$nick = $nick;
        self::$password = $password;

    }

    /**
     * returns information about the currently logged on user
     * @return [string] [all data about logged user]
     */
    public static function getUserData()
    {
        $data = "email : ".self::$email."<br>"
            ."nick : ".self::$nick."<br>"
            ."password : ".self::$password."<br>"
            ."first name : ".self::$firstname."<br>"
            ."last name : ".self::$lastname;

        return $data;
    }

    /**
     * clear information about the currently logged on user
     */
    public static function clearUserData()
    {
        self::$email = '';
        self::$firstname = '';
        self::$lastname = '';
        self::$nick = '';
        self::$password = '';
        self::$guest = true;
    }
    /**
     * [load information about the currently logged on user database]
     * @param  [string] $nick [nick logged user]
     */
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
