<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\PermisosHelpers;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title =$model->username;
$show_this_nav = PermisosHelpers::requerirMinimoRol('SuperUsuario');
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest && $show_this_nav) {
      echo Html::a('Actualizar', ['update', 'id' => $model->id], 
                             ['class' => 'btn btn-primary']);}?>
                             
    <?php if (!Yii::$app->user->isGuest && $show_this_nav) {
      echo Html::a('Eliminar', ['delete', 'id' => $model->id], [
         'class' => 'btn btn-danger',
         'data' => ['confirm' => Yii::t('app', 'SEGURO QUE DESEA ELIMINAR EL REGISTRO?'),
         'method' => 'post',
         ],
        ]);}?>
 
   </p>
 

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute'=>'profileLink', 'format'=>'raw'],
            //'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'rolNombre',
            'estadoNombre',
            'tipoUsuarioNombre',
            'created_at',
            'updated_at',
            //'verification_token',
            'id'
        ],
    ]) ?>

</div>
