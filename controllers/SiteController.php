<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegistrationForm;
use app\models\User;
use app\models\Users;
use app\models\UserInfoForm;
use yii\base\Model;
class SiteController extends Controller
{


    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRegistration()
    {
        $session = Yii::$app->session;
        $model = new RegistrationForm();
        if(!$session->has('nick')) {
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                User::setUserData($model->nick, $model->email, $model->password, '', '');
                if ($model->checkUserNickInDB()) {
                    if ($model->signup()) {
                        $session->set('nick', $model->nick);
                        return $this->render('form/userinfo');
                    }
                } else {
                    return $this->render('error', [
                        'error' => "никнейм уже занят"
                    ]);
                }

                return $this->render('form/registration', ['model' => $model]);
            }
            return $this->render('form/registration', ['model' => $model]);
        } else {
            return $this->render('error', [
                        'error' => "сначала розлагинтесь"
                    ]);
        }
    }

    public function actionLogin()
    {
        $session = Yii::$app->session;
        if(!$session->has('nick')) {
            $model = new LoginForm();

            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                User::setUserData($model->nick, '', $model->password, '', '');

                if ($model->login() == true) {
                    $session->set('nick', $model->nick);
                    return $this->render('form/userinfo', [
                        'model' => new UserInfoForm()
                    ]);
                } else {
                    return $this->render('form/login', [
                        'model' => $model
                    ]);
                }
            }

            return $this->render('form/login', [
                'model' => $model
            ]);
        } else {
            return $this->render('error', [
                'error' => 'сначaла розлагинтесь'
            ]);
        }
    }


    public function actionUserinfo()
    {


        $model = new UserInfoForm();

       
        if ($model->load(Yii::$app->request->post())) {
            User::setUserData($model->nick, $model->email, $model->password, $model->firstname, $model->lastname);
            $model->update();

        }

        $session = Yii::$app->session;

        if($session->has('nick')) {

            User::updateUserData($session->get('nick'));

            return $this->render('form/userinfo', [
                'model' => $model
            ]);
        } else {
            return $this->render('error', [
                'error' => "войдите в свой аккаунт"
            ]);
        }

    }

    public function actionLogout()
    {
        $session = Yii::$app->session;
        $session->remove('nick');
        User::clearUserData();

        return $this->render('index');
    }

    public function actionUpdate()
    {
        $session = Yii::$app->session;
        $model = new UserInfoForm();

        User::setUserData(
            Yii::$app->request->post('nick'),
            Yii::$app->request->post('email'),
            Yii::$app->request->post('password'),
            Yii::$app->request->post('firstname'),
            Yii::$app->request->post('lastname')
        );

        $model->update($session->get('nick'));

        return $this->render('form/userinfo', [
            'model' => $model
        ]);


    }

    public function actionSubmission()
    {

        $string = Yii::$app->request->post('string');

        return $this->render('form/userinfo', [
            'stringHash' => $string,
        ]);
    }
}
