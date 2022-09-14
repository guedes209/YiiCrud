<?php

use app\models\Funcionario;
use app\models\Cargo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;
use yii\bootstrap5\Alert;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Funcionarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funcionario-index">

    <?php
        if(isset($_GET['deleted']) && $_GET['deleted'] == '1'){
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-success',
                ],
                'body' => $_GET['message'],
            ]);
        } else if (isset($_GET['semCargo']) && $_GET['semCargo'] == '1'){
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-warning',
                ],
                'body' => $_GET['message'],
            ]);
        }
        $class = 'btn btn-success ';
        if(count(Cargo::find()->all()) == 0){
            $class .= 'disabled';
            echo Alert::widget([
                'options' => [
                    'class' => 'alert alert-warning',
                ],
                'body' => 'Registre pelo menos um cargo para registrar funcionários',
                'closeButton' => false
            ]);
        }
    ?>

    <div style="display:flex; justify-content: space-between;">
        <h1><?= Html::encode($this->title) ?></h1>
        <span>
            <?=
                Html::a('Registrar Funcionário', ['create'], ['class' => $class]) 
            ?>
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
                    $cargos = ArrayHelper::map($cargo,'id', 'nome');
                    return $cargos[$model['cargo_id']];
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
