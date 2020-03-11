<?php
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'action' =>['/site/nuevo']
]); ?>

<label for="idNombre">Nombre</label>
<input id="idNombre" type="text" name="nombre">
<label for="idDescripcion_corta">Descripcion corta</label>
<input id="idDescripcion_corta" type="text" name="descripcion_corta">
<label for="idDescripcion_larga">Descripcion larga</label>
<input id="idDescripcion_larga" type="text" name="descripcion_larga">
<label for="idPrivado">Privado</label>
<select name="idPrivado">
<option value="1" selected>No</option>
<option value="2">Si</option>
</select>

<?php ActiveForm::end(); ?>