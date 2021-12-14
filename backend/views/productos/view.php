<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model backend\models\Productos */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="productos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'nombre',
            'descripcion:ntext',
            'precio_costo',
            'precio_venta',
            'empresa_id',
            
            'unidad_id',
            'stock',
            'created_at',
            'updated_at',
            
        ],
    ]) ?>

</div>
