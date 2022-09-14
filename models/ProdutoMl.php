<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%produto_ml}}".
 *
 * @property int $id
 * @property string $codigo_ml
 */
class ProdutoMl extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%produto_ml}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo_ml'], 'required'],
            [['codigo_ml'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo_ml' => 'Codigo Ml',
        ];
    }
}
