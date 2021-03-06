<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Empresa */

$this->title = 'Registra tu Empresa';
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
