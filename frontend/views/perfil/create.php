<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model frontend\models\Perfil */

$this->title = 'Crear Perfil';
$this->params['breadcrumbs'][] = ['label' => 'Perfil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
