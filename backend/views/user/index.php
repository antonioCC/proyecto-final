<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4\Collapse;
use yii\bootstrap\Widget;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php   echo Collapse::widget([
 
     'items' => [
      // equivalente a lo de arriba
      [
          'label' => 'Search',
          'content' => $this->render('_search', ['model' => $searchModel]) ,
          // open its content by default
          //'contentOptions' => ['class' => 'in']
      ],
      
    ] 
]);

 
?>

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            ['attribute'=>'userIdLink', 'format'=>'raw'],
            ['attribute'=>'userLink', 'format'=>'raw'],
            ['attribute'=>'perfilLink', 'format'=>'raw'],
            //'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            
            'email:email',
            'rolNombre',
            'tipoUsuarioNombre',
            'estadoNombre',
            'created_at',
            //'estado_id',
            //'updated_at',
            //'verification_token',
            //'rol_id',
            //'tipo_usuario_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
