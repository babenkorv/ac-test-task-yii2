<?php
use yii\helpers\Url;
?>

<ul class="menu">
    <li class="menu-item"><a href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>"> main page </a></li>
    <li class="menu-item"><a href="<?= Yii::$app->urlManager->createUrl(['site/userinfo']) ?>"> user info </a></li>
    <li class="menu-item"><a href="<?= Yii::$app->urlManager->createUrl(['site/login']) ?>"> login </a></li>
    <li class="menu-item"><a href="<?= Yii::$app->urlManager->createUrl(['site/registration']) ?>"> registration </a></li>
    <li class="menu-item"><a href="<?= Yii::$app->urlManager->createUrl(['site/logout']) ?>"> log out </a></li>
</ul>