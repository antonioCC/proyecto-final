<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "compras".
 *
 * @property int $id
 * @property int $user_id
 * @property float $subtotal
 * @property int $iva
 * @property float $total
 * @property string $created_at
 * @property string $updated_at
 *
 * @property CompraDetalle[] $compraDetalles
 * @property PedidoDetalle[] $pedidoDetalles
 * @property Pedido $pedido
 */
class Compras extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'compras';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pedido_id','producto_id','factura_id',  'subtotal', 'iva', 'total'], 'required'],
            [['pedido_id', 'factura_id', 'producto_id','iva'], 'integer'],
            [['subtotal', 'total'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['pedido_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['pedido_id' => 'id']],
            [['producto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::className(), 'targetAttribute' => ['producto_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pedido_id' => 'Pedido ID',
            'compra_id' => 'Compra ID',
            'factura_id' => 'Factura ID',
            'subtotal' => 'Subtotal',
            'iva' => 'Iva',
            'total' => 'Total',
            'created_at' => 'Creado En',
            'updated_at' => 'Actualizado En',
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
           
        ];
    }


    /**
     * Gets query for [[CompraDetalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompraDetalles()
    {
        return $this->hasMany(CompraDetalle::className(), ['compra_id' => 'id']);
    }

    /**
     * Gets query for [[PedidoDetalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoDetalles()
    {
        return $this->hasMany(PedidoDetalle::className(), ['compra_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedido::className(), ['id' => 'pedido_id']);

    }
    public function getProducto()
    {
        return $this->hasOne(Productos::className(), ['id' => 'producto_id']);
    }

}
