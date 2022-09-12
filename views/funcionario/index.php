<?php

use app\models\Funcionario;
use app\models\Cargo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Funcionarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funcionario-index">

    <div style="display:flex; justify-content: space-between;">
        <h1><?= Html::encode($this->title) ?></h1>
        <span>
            <?= Html::a('Registrar Funcionário', ['create'], ['class' => 'btn btn-success']) ?>
        </span>
    </div>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
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
                'attribute' => 'cargo_id',
                'enableSorting' => true,
                'content' => function(Funcionario $model){
                    $cargo = Cargo::find()->all();
                    return $cargo[$model['cargo_id'] - 1]['nome'];
                }
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view}',
                'urlCreator' => function ($action, Funcionario $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
