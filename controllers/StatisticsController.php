<?php

namespace app\controllers;

use app\models\SurveySearch;
use yii\filters\AccessControl;
use yii\web\Controller;

/**
 * SurveyController implements the CRUD actions for Survey model.
 */
class StatisticsController extends Controller
{
    /**
     * @inheritDoc
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'surveySearch' => new SurveySearch()
        ]);
    }

}
