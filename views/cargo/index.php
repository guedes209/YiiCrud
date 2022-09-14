<?php

use app\models\Cargo;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap5\Alert;
/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Cargos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargo-index">

    <?php
        if(isset($_GET['deleted']) && $_GET['deleted'] == 0){
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-danger',
                ],
                'body' => $_GET['message'],
            ]);
        } else if(isset($_GET['message'])){
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-success',
                ],
                'body' => $_GET['message'],
            ]);
        }
    ?>

    <div style="display:flex; justify-content: space-between;">
        <h1><?= Html::encode($this->title) ?></h1>
        <span>
            <?= Html::a('Registrar cargo', ['create'], ['class' => 'btn btn-success']) ?>
        </span>
    </div>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'nome',
            [
                'class' => ActionColumn::className(),
                'template' => '{view}',
                'urlCreator' => function ($action, Cargo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
