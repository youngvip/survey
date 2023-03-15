<?php

use kartik\rating\StarRating;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Survey $model */

$this->title = $model->name;
\yii\web\YiiAsset::register($this);
?>
<div class="survey-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->can('admin')) { ?>
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php } ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'email:email',
            'phone',
            'region',
            'city',
            'gender',
            [
                'attribute' => 'rating',
                'format' => 'raw',
                'value' => function ($model) {
                    return StarRating::widget([
                        'model' => $model,
                        'attribute' => 'rating',
                        'pluginOptions' => [
                            'size' => 'sm',
                            'stars' => 10,
                            'step' => 1,
                            'max' => 10,
                            'displayOnly' => true
                        ]
                    ]);
                },
            ],
            'comment:ntext',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
