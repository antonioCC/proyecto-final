<?php
namespace backend\traits;
use yii;
use backend\models\Empresa;
use backend\models\Compras;
use backend\models\Pedido;



trait EnforceProjectContextTrait
{
    public function loadEmpresa($empresa_id)
    {
        if (($model = Empresa::findOne($empresa_id)) !== null) {
            return $model;
        } else {
            throw new ForbiddenHttpException('You must select a valid project.');
        }
    }

    public function loadpedido($pedido_id)
    {
        if (($model = Pedido::findOne($pedido_id)) !== null) {
            return $model;
        } else {
            throw new ForbiddenHttpException('You must select a valid project.');
        }
    }

   
}

