<?php

use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var app\models\Survey $model */

$this->title = 'Анкета';
?>
<div class="survey-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
