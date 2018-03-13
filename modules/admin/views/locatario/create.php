<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Locatario */

$this->title = 'Cadastrar Locatario';
$this->params['breadcrumbs'][] = ['label' => 'Locatarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locatario-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
