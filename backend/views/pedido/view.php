<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\bootstrap4\Modal;
use yii\helpers\Url;
use backend\models\Compras;
use yii\web\View;
use yii\widgets\Pjax;





/* @var $this yii\web\View */
/* @var $model backend\models\Pedido */

$this->title = 'Pedido de '. $model->user->username;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pedido-view">

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
        <?= Html::a('Detalles de pedido', ['pedido-detalle/create', 'pedido_id' => $model->id], ['class' => 'btn btn-info']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           //'id',
            'user_id',
            'subtotal',
            'iva',
            'total',
            'created_at',
            'updated_at',
            'status_id',
        ],
    ]) ?>

<h3 style="text-align: center;color:brown;">Compras del pedido </h3>
<?= Html::a('Añadir Compra', '#', [
   'id' => 'activity-index-link',
   'class' => 'btn btn-success',
   'data-toggle' => 'modal',
   'data-target' => '#modal',
   'data-url' => Url::to(['compras/create', 'pedido_id' => $model->id]),
   'data-pjax' => '0',
]); ?>

<?php Pjax::begin() ?>
     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id' => 'compras-grid',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pedido_id',
            'producto_id',
            'factura_id',
            'subtotal',
            'iva',
            'total',
            //'created_at',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'controller' => 'compras',
                'buttons' => [
                    'view'=>function ($url, $model, $key) {
                        return Html::a('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"  class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                      </svg>', '#', [
                        'id' => 'activity-index-link',
                        'title' => Yii::t('app', 'View'),
                        'data-toggle' => 'modal',
                        'data-target' => '#modal',
                        'data-url' => Url::to(['compras/view', 'id' => $model->id]),
                        'data-pjax' => '0',
                    ]);
                },

                    'update' => function ($url, $model, $key) {
                        return Html::a('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                      </svg>', '#', [
                            'id' => 'activity-index-link',
                            'title' => Yii::t('app', 'Update'),
                            'data-toggle' => 'modal',
                            'data-target' => '#modal',
                            'data-url' => Url::to(['compras/update', 'id' => $model->id]),
                            'data-pjax' => '0',
                        ]);
                    },
                    'delete' => function ($url, $model)
                    {
                        return Html::a('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                      </svg>', $url, [
                            'title' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', '¿Estás seguro de que quieres eliminar esta informacion?'),
                            'data-method' => 'post',
                        ]);
                    },
                ]
            ],
        ],
    ]); ?>
<?php Pjax::end() ?>
<?php
    $this->registerJs(
         "$(document).on('click', '#activity-index-link', (function() 
         {
             $.get(
             $(this).data('url'),
             function (data) {
                 $('.modal-body').html(data);
                 $('#modal').modal();}
            );
        }));"
 ); ?>

    <?php
    Modal::begin([
        'id' => 'modal',
       // 'title' => '<h4 class="modal-title">Complete</h4>',
        'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Cerrar</a>',
    ]);

    echo "<div class='well'></div>";

    Modal::end();
    ?>

</div>