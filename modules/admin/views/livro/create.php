<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Livro */

$this->title = 'Cadastrar Livro';
$this->params['breadcrumbs'][] = ['label' => 'Livros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="livro-create">


    <?= $this->render('_form', [
        'model' => $model,
        'categoria' => $categoria
    ]) ?>

</div>
