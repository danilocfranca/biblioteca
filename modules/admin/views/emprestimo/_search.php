<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmprestimoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emprestimo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'livro_id') ?>

    <?= $form->field($model, 'locatario_id') ?>

    <?= $form->field($model, 'data_retirada') ?>

    <?= $form->field($model, 'data_prevista_devolucao') ?>

    <?php // echo $form->field($model, 'valor_emprestimo') ?>

    <?php // echo $form->field($model, 'data_devolucao') ?>

    <?php // echo $form->field($model, 'valor_pago') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
