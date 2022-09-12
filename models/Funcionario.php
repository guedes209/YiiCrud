<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%funcionario}}".
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string|null $logradouro
 * @property string|null $cep
 * @property string|null $cidade
 * @property string|null $estado
 * @property int|null $numero
 * @property string|null $complemento
 * @property int $cargo_id
 *
 * @property Cargo $cargo
 */
class Funcionario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%funcionario}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'cpf', 'cargo_id'], 'required'],
            [['numero', 'cargo_id'], 'default', 'value' => null],
            [['numero', 'cargo_id'], 'integer'],
            [['nome', 'cpf', 'logradouro', 'cep', 'cidade', 'estado', 'complemento'], 'string', 'max' => 255],
            [['cargo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::class, 'targetAttribute' => ['cargo_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cpf' => 'CPF',
            'logradouro' => 'Logradouro',
            'cep' => 'CEP',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
            'cargo_id' => 'Cargo',
        ];
    }

    /**
     * Gets query for [[Cargo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Cargo::class, ['id' => 'cargo_id']);
    }
}
