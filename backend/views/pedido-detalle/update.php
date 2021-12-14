<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PedidoDetalle */

$this->title = 'Actualizar Detalle de pedido: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Detalles de pedido', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="pedido-detalle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
