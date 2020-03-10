<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "marcadores".
 *
 * @property int $id
 * @property string|null $nombre
 * @property string|null $enlace
 * @property string|null $descripcion_corta
 * @property string|null $descripcion_larga
 * @property string|null $tipo
 */
class Marcadores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marcadores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo'], 'string'],
            [['nombre', 'enlace', 'descripcion_corta'], 'string', 'max' => 255],
            [['descripcion_larga'], 'string', 'max' => 4096],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'enlace' => 'Enlace',
            'descripcion_corta' => 'Descripcion Corta',
            'descripcion_larga' => 'Descripcion Larga',
            'tipo' => 'Tipo',
        ];
    }
}
