<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\PermisosHelpers;


/* @var $this yii\web\View */
/* @var $model frontend\models\Perfil */

$this->title = "Perfil de " . $model->user->username;

$this->params['breadcrumbs'][] = ['label' => 'Perfiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="perfil-view">

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?Php

    //esto no es necesario pero está aquí como ejemplo

    if (PermisosHelpers::userDebeSerPropietario('perfil', $model->id)) {

        echo Html::a('Actualizar', ['update', 'id' => $model->id],
            ['class' => 'btn btn-primary']);
    } ?>

    <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => Yii::t('app', 'Are you sure to delete this item?'),
            'method' => 'post',
        ],
    ]) ?>

</p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'user_id',
            'user.username',
            'nombres:ntext',
            'apellidos:ntext',
            'fecha_nacimiento',
            'created_at',
            'updated_at',
            'direccion:ntext',
            'telefono',
            'genero.genero_nombre',

        ],
    ]) ?>

</div>
