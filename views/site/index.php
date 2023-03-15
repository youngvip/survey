<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Здравствуйте!</h1>

        <p class="lead">Это мини сервис для прохождения анкетирования</p>

        <p>
            <?= Html::a('Пройти анкету', ['/survey/create'], ['class' => 'btn btn-lg btn-success']) ?>
        </p>
    </div>
</div>
