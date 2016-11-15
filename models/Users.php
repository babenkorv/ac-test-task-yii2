<?php

namespace app\models;

use Yii;

class Users extends \yii\db\ActiveRecord
{
    public function rules()
    {
        return [
            [['nick', 'password', 'email'], 'required'],
            [['activate'], 'integer'],
            [['nick', 'firstname', 'lastname', 'password', 'email'], 'string', 'max' => 20],
        ];
    }
}
