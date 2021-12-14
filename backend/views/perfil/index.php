<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \yii\bootstrap4\Collapse;
 

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PerfilSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php   echo Collapse::widget([
                        
      'items' => [
       // equivalent to the above
            [
            'label' => 'Search',
            'content' => $this->render('_search', ['model' => $searchModel]) ,
             // open its content by default
             //'contentOptions' => ['class' => 'in']
             ],
                                       
            ] 
        ]); ?> 

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            ['attribute'=>'perfilIdLink', 'format'=>'raw'],
            ['attribute'=>'userLink', 'format'=>'raw'],
            //'user_id',
            'nombres:ntext',
            'apellidos:ntext',
            'fecha_nacimiento',
            'generoNombre',
            'direccion:ntext',
             'telefono',
             //'created_at',
            //'updated_at',
            
            //'genero_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
