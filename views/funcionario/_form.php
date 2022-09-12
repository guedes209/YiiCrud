<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Cargo;

/** @var yii\web\View $this */
/** @var app\models\Funcionario $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="funcionario-form">

    <?php 
        $cargos = Cargo::find()->all();
        $cargos = ArrayHelper::map($cargos,'id', 'nome');
        $form = ActiveForm::begin(); 
    ?>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
        </div>
    
        <div class="col">
            <?= $form->field($model, 'cpf')->textInput(['maxlength' => true]) ?>
        </div>
    
        <div class="col">
            <?= $form->field($model, 'cep')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'logradouro')->textInput(['maxlength' => true]) ?>
        </div>
    
        <div class="col">
            <?= $form->field($model, 'complemento')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'cidade')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'numero')->textInput() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'cargo_id')->dropDownList($cargos) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success mt-3']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style>
.form-func{
    display:flex;
}
</style>