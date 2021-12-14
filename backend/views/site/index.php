<?php

use yii\helpers\Html;
use common\models\PermisosHelpers;
use yii\helpers\Url;
/**
 * @var yii\web\View $this
 */

$this->title = 'FF MANAGEMENT';

$es_admin = PermisosHelpers::requerirMinimoRol('Admin');

?><br>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">FF-MANAGEMENT</h1>
        


<div class="body-content">

<div class="row">
    <div class="col-lg-6 ">

        <h2 ALIGN="center">Empresas</h2>
        <IMG src=  <?php echo Url::to('@web/archivos/lugares.png',true); ?> width="50%" height="50%"  BORDER=0 ALT="Imagen de Enzabezado" ALIGN="center">


        <p ALIGN="center">

            <?php

            if (!Yii::$app->user->isGuest && $es_admin) {

                echo Html::a('Comienza Ahora', ['empresa/index'], ['class' => 'btn btn-secondary']);

            }

            ?>

        </p>

    </div>
    <div class="col-lg-6">

        <h2 ALIGN="center">Pedidos</h2>
        <IMG src=  <?php echo Url::to('@web/archivos/compras.png',true); ?> width="50%" height="50%"  BORDER=0 ALT="Imagen de Enzabezado" ALIGN="center">
        

        <p ALIGN="center" >

            <?php

            if (!Yii::$app->user->isGuest && $es_admin) {

                echo Html::a('Realizar Pedido', ['pedido/index'], ['class' => 'btn btn-secondary'] );

            }

            ?>

        </p>

    </div>
    </div>
    </p>
    
    
</div>
</div>
</div>