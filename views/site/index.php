<?php

/* @var $this yii\web\View */

$this->title = 'Página principal';
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div style="text-align: center;">
    <ul class="nav nav-pills" style="display: inline-block;">
        <li role="presentation" class="<?= $publicos ?>"><a href="<?=  Url::toRoute(['site/index']) ?>">Publicos</a></li>
        <li role="presentation" class="<?= $privados ?>"><a href="<?=  Url::toRoute(['site/privados']) ?>">Privados</a></li>
        <li role="presentation" class="<?= $admin ?>"><a href="#">Admin</a></li>
    </ul>
</div>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        [
            'label' => 'Enlace',
            'format' => 'raw',
            'value' => function($data) {
                return Html::a($data->enlace, $data->url, ['target' => '_blank']);
            }
        ],
        [
            'label' => 'Descripción',
            'value' => 'descripcion_corta',
        ],
    ]
]) ?>
