<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CompraDetalle */

$this->title = 'Actualizar Detalles de compra: ' . $model->factura_id;
$this->params['breadcrumbs'][] = ['label' => 'Detalles de compra', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->factura_id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="compra-detalle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
