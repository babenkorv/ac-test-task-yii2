<?php

namespace app\models;

use Yii;

/** 
* This is the model class for table "users". 
* 
* @property integer $id 
* @property string $nick 
* @property string $email 
* @property string $firstname 
* @property string $lastname 
* @property integer $activate 
* @property string $password 
*/ 

class Users extends \yii\db\ActiveRecord
{

	/** 
    * @inheritdoc 
    */ 
    public function rules()
    {
        return [
            [['nick', 'password', 'email'], 'required'],
            [['activate'], 'integer'],
            [['nick', 'firstname', 'lastname', 'password', 'email'], 'string', 'max' => 20],
        ];
    }
}
