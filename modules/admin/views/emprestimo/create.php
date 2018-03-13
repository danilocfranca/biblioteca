<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Emprestimo */

$this->title = 'Cadastrar Emprestimo';
$this->params['breadcrumbs'][] = ['label' => 'Emprestimos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emprestimo-create">


    <?= $this->render('_form', [
        'model' => $model,
        'livro' => $livro,
        'locatario' => $locatario,
        'custo' => $custo
    ]) ?>

</div>
