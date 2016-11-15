<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form=ActiveForm::begin(); ?>

    <?= $form->field($model, 'nick') ?>
    <?= $form->field($model, 'password') ?>

    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
