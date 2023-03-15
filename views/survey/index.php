<?php

use app\models\Survey;
use kartik\daterange\DateRangePicker;
use kartik\rating\StarRating;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\SurveySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Surveys';


?>
<div class="survey-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Survey', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
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
                        'name' => 'rating' . $model->id,
                        'value' => $model->rating,
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
            [
                'attribute' => 'created_at',
                'format' => 'datetime',
                'filter' => DateRangePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'created_at',
                    'convertFormat' => true,
                    'pluginOptions' => [
                        'locale' => ['format' => 'Y-m-d'],
                    ]
                ])
            ],
//            [
//                'attribute' => 'updated_at',
//                'format' => 'datetime',
//                'filter' => DateRangePicker::widget([
//                    'model' => $searchModel,
//                    'attribute' => 'updated_at',
//                    'convertFormat' => true,
//                    'pluginOptions' => [
//                        'locale' => ['format' => 'Y-m-d'],
//                    ]
//                ])
//            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Survey $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
