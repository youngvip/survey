<?php

use kartik\rating\StarRating;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Survey $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="survey-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-3 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'email')->input('email') ?>

    <?= $form->field($model, 'phone')->input('number') ?>

    <?= $form->field($model, 'region')->textInput() ?>

    <?= $form->field($model, 'city')->textInput() ?>

    <?= $form->field($model, 'gender')->dropDownList(['Мужской'=>'Мужской', 'Женский'=>'Женский']) ?>

    <?= $form->field($model, 'rating')->widget(StarRating::class, [
        'pluginOptions' => [
            'stars' => 10,
            'step' => 1,
            'max' => 10
        ]
    ])->label('Порекомендовали ли вы нас') ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Оправить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
