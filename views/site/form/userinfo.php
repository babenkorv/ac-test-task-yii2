<?php
use \app\models\User;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
?>


<?php Pjax::begin(); ?>
<div class="block">

        <?= Html::beginForm(['update'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>
            <p class="title">обновить данные : <?= User::$nick?></p>

            <p>email : <?= User::$email?></p>

            <?= Html::input('text', 'email', Yii::$app->request->post('email'), ['class' => 'form-control']) ?>
            <p>password : <?= User::$password?></p>
            <?= Html::input('text', 'password', Yii::$app->request->post('password'), ['class' => 'form-control']) ?>
            <p>firstname : <?= User::$firstname?></p>
            <?= Html::input('text', 'firstname', Yii::$app->request->post('firstname'), ['class' => 'form-control']) ?>
            <p>lastname : <?= User::$lastname?></p>
            <?= Html::input('text', 'lastname', Yii::$app->request->post('lastname'), ['class' => 'form-control']) ?>
            <br>
            <br>
            <?= Html::submitButton('Обновить', ['class' => 'btn btn-lg btn-primary', 'name' => 'hash-button']) ?>
        <?= Html::endForm() ?>
    <?php Pjax::end(); ?>

</div>
<?php
//echo $url = Yii::$app->urlManager->createUrl(['site/update']);
/*
echo \yii\bootstrap\Html::a('delete','', [
    'class' => 'btn btn-primary',
    'onclick' => "
        $.ajax({
            type: 'POST',
            url: $url,
            success: function() {
                alert('ok');
            },
            error: function() {
                alert('error');
            }
        });
        return false;
    ",
]);
*/
/*
echo \yii\helpers\Html::a('dsa',$url, [
    'method' => 'post',
    'param' => [
        'key' => $model
    ]
]);
*/


?>