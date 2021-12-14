<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use common\models\User;
use kartik\widgets\Typeahead;
use yii\helpers\Url;
  

/**
 * This is the model class for table "pedido".
 *
 * @property int $id
 * @property int $user_id
 * @property float $subtotal
 * @property int $iva
 * @property float $total
 * @property string $created_at
 * @property string $updated_at
 * @property int $status_id
 *
 * @property PedidoDetalle[] $pedidoDetalles
 * @property Status $status
 * @property User $user
 */
class Pedido extends \yii\db\ActiveRecord
{
    public $userEmail;
   
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id','userEmail', 'subtotal', 'iva', 'total', 'status_id'], 'required'],
            [['userEmail'], 'string'],
            [['user_id', 'iva', 'status_id'], 'integer'],
            [['subtotal', 'total'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
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
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'subtotal' => 'Subtotal',
            'iva' => 'Iva',
            'total' => 'Total',
            'created_at' => 'Creado En',
            'updated_at' => 'Actualizado En',
            'status_id' => 'Status ID',
        ];
    }

    /**
     * Gets query for [[PedidoDetalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoDetalles()
    {
        return $this->hasMany(PedidoDetalle::className(), ['pedido_id' => 'id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public function getStatusesList()
{
    $statuses = Status::find()->all();

    $statusesList = ArrayHelper::map($statuses, 'id', 'descrpcion');

    return $statusesList;
}

}
