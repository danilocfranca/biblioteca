<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Custo */

$this->title = 'Update Custo: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Custos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="custo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
