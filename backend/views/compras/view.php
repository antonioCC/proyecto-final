<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Compras */

$this->title = 'Compra '.   $model->factura_id;
$this->params['breadcrumbs'][] = ['label' => 'Compras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="compras-view">

    <h1><?= Html::encode($this->title) ?></h1>

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pedido_id',
            'producto_id',
            'factura_id',
            'subtotal',
            'iva',
            'total',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
