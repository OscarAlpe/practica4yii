<?php

/* @var $this yii\web\View */

$this->title = 'Página principal';
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$script = "$('#myModal').on('show.bs.modal', function (event) {
  var link = $(event.relatedTarget) // Button that triggered the modal
  var recipient = link.data('descripcion_larga') // Extract info from data-* attributes
  var url = link.data('url') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  var btnVisitar =$('#btnVisitar')
  modal.find('.modal-body').html(recipient)
  btnVisitar.attr('data-url', url);
})";

$this->registerJs($script);

$script2 = "$('#btnVisitar').click(function() {
  var btnVisitar = $(this)
  // Funciona ir a la página anterior
  window.location.href = btnVisitar.attr('data-url');
})";

$this->registerJs($script2);
?>
<div style="text-align: center;">
    <ul class="nav nav-pills" style="display: inline-block;">
        <li role="presentation" class="<?= $publicos ?>"><a href="<?=  Url::toRoute(['site/index']) ?>">Publicos</a></li>
        <li role="presentation" class="<?= $privados ?>"><a href="<?=  Url::toRoute(['site/privados']) ?>">Privados</a></li>
        <li role="presentation" class="<?= $admin ?>"><a href="<?=  Url::toRoute(['site/admin']) ?>">Admin</a></li>
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
            'format' => 'raw',
            'value' => function($data) {
                return Html::a($data->descripcion_corta, '#',
                        ["data-toggle" => "modal", "data-target" => "#myModal",  "data-descripcion_larga" => "$data->descripcion_larga", "data-url" => "$data->url"]);
            }
        ],
    ]
]) ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Descripcion</h3>
      </div>
      <div class="modal-body">
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button id="btnVisitar" type="button" class="btn btn-default btn-primary" data-dismiss="modal" data-url="">Visitar</button>
      </div>
    </div>
  </div>
</div>
