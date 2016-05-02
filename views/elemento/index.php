<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ElementoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Elementos';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="elemento-index">


    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Elemento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idelemento',
            'nome',
            'tempo',
            'descricao:ntext',
            'tipo_idtipo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
