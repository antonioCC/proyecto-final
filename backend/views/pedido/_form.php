<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Typeahead;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Pedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
echo $form->field($model, 'userEmail')->widget(Typeahead::classname(), [
    'options' => ['placeholder' => 'Type user email ...'],
    'pluginOptions' => ['highlight'=>true],
    'dataset' => [
        [
            'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('value')",
            'display' => 'value',
            'remote' => [
                'url' => Url::to(['pedido/user-list']) . '?q=%QUERY',
                'wildcard' => '%QUERY'
            ]
        ]
    ]
]);
?>


    <?= $form->field($model, 'subtotal')->textInput() ?>

    <?= $form->field($model, 'iva')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>


    <?= $form->field($model, 'status_id')->dropDownList($model->getStatusesList(), ['prompt'=>'Seleccionar...']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
