<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Perfil */

$this->title = 'Actualizar el Perfil de '. $model->user->username;
$this->params['breadcrumbs'][] = ['label' => 'Perfil', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="perfil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
