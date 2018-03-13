<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LocatarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Locatario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locatario-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Cadastrar Locatario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'nome',
            'cpf',
            'email:email',
            'data_nascimento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
