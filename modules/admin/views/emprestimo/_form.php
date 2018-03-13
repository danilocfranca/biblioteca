<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Emprestimo */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if(count($livro) == 0):?>

Não possui livros disponíveis para emprestimo

<?php else:?>

<div class="emprestimo-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-6">
    <?= $form->field($model, 'livro_id')->dropDownList(
        \yii\helpers\ArrayHelper::map($livro, 'id', 'nome'),           // Flat array ('id'=>'label')
        ['prompt'=>'']    // options

    ) ?>
    </div>

    <div class="col-md-6">
    <?= $form->field($model, 'locatario_id')->dropDownList(
        \yii\helpers\ArrayHelper::map($locatario, 'id', 'nome'),           // Flat array ('id'=>'label')
        ['prompt'=>'']    // options

    ) ?>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'data_retirada')->input('date', ['value' => ($model->data_retirada == null) ? date('Y-m-d') : $model->data_retirada, 'readonly' => 'readonly']) ?>
    </div>

    <div class="col-md-6">
    <?= $form->field($model, 'data_prevista_devolucao')->input('date') ?>
    </div>

    <div class="col-md-6">
        <input type="hidden" value="<?=$custo->valor?>" id="custo_emprestimo">
    <?= $form->field($model, 'valor_emprestimo')->textInput(['maxlength' => true, 'readonly' => 'readonly']) ?>
    </div>

    <?php if (!$model->isNewRecord):?>
        <input type="hidden" value="<?=$multa->valor?>" id="multa_emprestimo">
        <div class="col-md-6">
        <?= $form->field($model, 'data_devolucao')->input('date',['value' => date('Y-m-d'), 'readonly' => 'readonly']) ?>
        </div>

        <div class="col-md-6">
        <?= $form->field($model, 'valor_pago')->textInput(['maxlength' => true]) ?>
        </div>
    <?php endif;?>
    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php endif;?>

<script>
        $(document).ready(function(){
            $('#emprestimo-data_prevista_devolucao').on('blur', function(){
                custoEmprestimo();
            });
        });

        function custoEmprestimo(){
            var start = new Date($('#emprestimo-data_retirada').val());
            var end = new Date($('#emprestimo-data_prevista_devolucao').val());

            var diff = new Date(end - start);

            var days = diff/1000/60/60/24;
            var custo_emprestimo = $('#custo_emprestimo').val();
            var custo = custo_emprestimo * days;
            $('#emprestimo-valor_emprestimo').val(custo);
        }

    function custoPagar(){
        var start = new Date($('#emprestimo-data_retirada').val());
        var end = new Date($('#emprestimo-data_devolucao').val());
        var previsto = new Date($('#emprestimo-data_devolucao').val());

        var diff = new Date(end - start);

        var days = diff/1000/60/60/24;
        var custo_emprestimo = $('#custo_emprestimo').val();
        var custo = custo_emprestimo * days;

        $('#emprestimo-valor_pago').val(custo);
    }

    custoPagar();

</script>