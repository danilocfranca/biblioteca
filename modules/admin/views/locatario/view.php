<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Locatario */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Locatarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locatario-view">


    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn-sm btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn-sm btn-danger',
            'data' => [
                'confirm' => 'Deseja realizar a exclusão?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            'cpf',
            'email:email',
            'data_nascimento',
        ],
    ]) ?>

</div>
