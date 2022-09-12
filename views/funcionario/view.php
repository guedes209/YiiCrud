<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Cargo;

/** @var yii\web\View $this */
/** @var app\models\Funcionario $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Funcionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="funcionario-view">

    <div style="display:flex; justify-content: space-between;">
        <h1><?= Html::encode($this->title) ?></h1>
    
        <span>
            <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Deletar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Deseja deletar esse funcionário?',
                    'method' => 'post',
                ],
            ]) ?>
        </span>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'cpf',
            'logradouro',
            'cep',
            'cidade',
            'estado',
            'numero',
            'complemento',
            [
                'attribute' => 'group_id',
                'value' => function($model){
                    $cargo = Cargo::find()->all();
                    return $cargo[$model['cargo_id'] - 1]['nome'];
                }
            ]
        ],
    ]) ?>

</div>
