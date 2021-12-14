<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PedidoDetalle */

$this->title = 'Añadir detalle de pedido';
$this->params['breadcrumbs'][] = ['label' => 'Detalles de pedido', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-detalle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
