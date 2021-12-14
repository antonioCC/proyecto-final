<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PedidoDetalle */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Detalles de pedido', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pedido-detalle-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿ESTA SEGURO QUE DESEA ELIMINAR EL REGISTRO?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pedido_id',
            'empresa_id',
            'compra_id',
            'precio_compra',
            'precio_venta',
        ],
    ]) ?>

</div>
