<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Emprestimo */

$this->title = 'Emprestimo: '.$model->livro->nome;
$this->params['breadcrumbs'][] = ['label' => 'Emprestimos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="emprestimo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'livro' => $livro,
        'locatario' => $locatario,
        'custo' => $custo,
        'multa' => $multa
    ]) ?>

</div>
