<?php

/* @var $this yii\web\View */

$this->title = 'Página principal';
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<?php
$form = ActiveForm::begin([
    'action' =>['/site/nuevo']
]); ?>
<button class="btn btn-default btn-primary pull-right" type="submit" style="margin-bottom: 20px;">Nuevo</button>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'enlace',
        'descripcion_corta',
    ],
    'layout' => '{items}',
]) ?>
<button class="btn btn-default btn-primary pull-right" type="submit">Nuevo</button>
<?php
ActiveForm::end();
?>