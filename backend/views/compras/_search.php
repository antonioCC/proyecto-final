<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ComprasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compras-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pedido_id') ?>

    <?= $form->field($model, 'producto_id') ?>

    <?= $form->field($model, 'factura_id') ?>
    
    <?= $form->field($model, 'subtotal') ?>

    <?= $form->field($model, 'iva') ?>

    <?= $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
