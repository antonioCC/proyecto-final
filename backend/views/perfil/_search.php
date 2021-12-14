<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Perfil;

/* @var $this yii\web\View */
/* @var $model backend\models\search\PerfilSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

   

    <?= $form->field($model, 'nombres') ?>

    <?= $form->field($model, 'apellidos') ?>

    <?= $form->field($model, 'fecha_nacimiento') ?>
    <?php // echo $form->field($model, 'genero_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'telefono') ?>
    <?= $form->field($model, 'genero_id')->dropDownList(Perfil::getGeneroLista(), 
                                         [ 'prompt' => 'Por Favor Elija Uno' ]);?>
 

    

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
