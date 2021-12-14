<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Productos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-form">

<?php $form = ActiveForm::begin([
        'id' => 'productos-form',
        'enableAjaxValidation' => true,
        'enableClientScript' => true,
        'enableClientValidation' => true,
    ]); ?>

   

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'precio_costo')->textInput() ?>

    <?= $form->field($model, 'precio_venta')->textInput() ?>


    <?= $form->field($model, 'unidad_id')->dropDownList($model->getUnidadesesList(), ['prompt'=>'Seleccionar...']) ?>

    <?= $form->field($model, 'stock')->textInput() ?>

  

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php
    $this->registerJs('
    
        $("form#productos-form").on("beforeSubmit", function(e) {
            var form = $(this);
            $.post(
                form.attr("action")+"&submit=true",
                form.serialize()
            )
            .done(function(result) {
                form.parent().html(result.message);
                $.pjax.reload({container:"#productos-grid"});
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
</div>
