<?php
/** @var yii\web\View $this */
/** @var app\models\SurveySearch $surveySearch */

use scotthuangzl\googlechart\GoogleChart;
use yii\bootstrap5\Html;

?>
<div class="statistics-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="col">
        <?= GoogleChart::widget([
            'visualization' => 'PieChart',
            'data' => array_merge([['Task', 'Hours per Day']] , $surveySearch->getGenderCount()) ,
            'options' => array('title' => 'Процент опрошенных по полу')
        ]) ?>

        <?= GoogleChart::widget([
            'visualization' => 'ColumnChart',
            'data' => array_merge([['Task', 'Количество опрошенных']] , $surveySearch->getCityCount()) ,
            'options' => array('title' => 'Города участников')
        ]) ?>

    </div>
</div>


