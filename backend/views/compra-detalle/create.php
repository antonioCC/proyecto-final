<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CompraDetalle */

$this->title = 'Añadir Detalle de compra';
$this->params['breadcrumbs'][] = ['label' => 'Detalle de compra', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compra-detalle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
