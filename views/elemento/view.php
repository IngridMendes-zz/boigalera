<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Elemento */

$this->title = $model->idelemento;
$this->params['breadcrumbs'][] = ['label' => 'Elementos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="elemento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idelemento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idelemento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idelemento',
            'nome',
            'tempo',
            'descricao:ntext',
            'tipo_idtipo',
        ],
    ]) ?>

</div>
