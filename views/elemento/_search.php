<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ElementoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="elemento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idelemento') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'tempo') ?>

    <?= $form->field($model, 'descricao') ?>

    <?= $form->field($model, 'tipo_idtipo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
