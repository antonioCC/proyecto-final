<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Compras */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compras-form">
<?php $form = ActiveForm::begin([
        'id' => 'compras-form',
        'enableAjaxValidation' => true,
        'enableClientScript' => true,
        'enableClientValidation' => true,
    ]); ?>
   
    
    <?= $form->field($model, 'producto_id')->textInput() ?>
    <?= $form->field($model, 'factura_id')->textInput() ?>

    <?= $form->field($model, 'subtotal')->textInput() ?>

    <?= $form->field($model, 'iva')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php
    $this->registerJs('
    
        $("form#compras-form").on("beforeSubmit", function(e) {
            var form = $(this);
            $.post(
                form.attr("action")+"&submit=true",
                form.serialize()
            )
            .done(function(result) {
                form.parent().html(result.message);
                $.pjax.reload({container:"#compras-grid"});
            });
            return false;
        }).on("submit", function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            return false;
        });
    ');
    ?>

</div>
