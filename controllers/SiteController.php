<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Marcadores;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $query = Marcadores::find()->select("marcadores.*")->where("tipo = 'Publico'");
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        return $this->render('index',[
            'dataProvider' => $dataProvider,
            'publicos' => 'active',
            'privados' => '',
            'admin' => '',
        ]);
    }

    public function actionPrivados()
    {
        $query = Marcadores::find()->select("marcadores.*");
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        return $this->render('index',[
            'dataProvider' => $dataProvider,
            'publicos' => '',
            'privados' => 'active',
            'admin' => '',
        ]);
    }

}
