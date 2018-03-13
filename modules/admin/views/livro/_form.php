<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Livro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="livro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoria')
        ->dropDownList(
            \yii\helpers\ArrayHelper::map($categoria, 'id', 'descricao'),           // Flat array ('id'=>'label')
            ['prompt'=>'']    // options
        ); ?>

    <?= $form->field($model, 'quantidade')->input('number', ['min' => 1, 'max' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
