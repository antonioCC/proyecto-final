<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\search\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?php echo $form->field($model, 'email') ?>

    <?= $form->field($model, 'rol_id')->dropDownList(User::getRolLista(), [ 'prompt' => 'Por Favor Elija Uno' ]);?>
    
    <?= $form->field($model, 'tipo_usuario_id')->dropDownList(User::getTipoUsuarioLista(), [ 'prompt' => 'Por Favor Elija Uno' ]);?>
 
    <?= $form->field($model, 'estado_id')->dropDownList($model->estadoLista, [ 'prompt' => 'Por Favor Elija Uno' ]);?>
    
    <?php // $form->field($model, 'auth_key') ?>

    <?php //$form->field($model, 'password_hash') ?>

    <?php // $form->field($model, 'password_reset_token') ?>

   
    <?php // echo $form->field($model, 'estado_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'verification_token') ?>

    <?php // echo $form->field($model, 'rol_id') ?>

    <?php // echo $form->field($model, 'tipo_usuario_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
