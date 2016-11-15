<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<?php $f = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $f->field($registerForm, 'uname') ?>
    <?= $f->field($registerForm, 'email') ?>
    <?= $f->field($registerForm, 'password') ?>
    <?= Html::submitButton('отправить'); ?>
<?php ActiveForm::end(); ?>


<?php $f2 = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $f2->field($loginForm, 'uname') ?>
    <?= $f2->field($loginForm, 'password') ?>
    <?= Html::submitButton('отправить'); ?>
<?php ActiveForm::end(); ?>