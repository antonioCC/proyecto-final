<?php

namespace backend\models;


use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use frontend\models;
use backend\models\Empresa;
use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property float $precio_costo
 * @property float $precio_venta
 * @property int $empresa_id
 * @property int $unidad_id
 * @property int $stock
 * @property string $created_at
 * @property string $updated_at
 *
 * @property CompraDetalle[] $compraDetalles
 * @property Empresa $empresa
 * @property Unidades $unidad
 */
class Productos extends \yii\db\ActiveRecord 
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'precio_costo', 'precio_venta', 'empresa_id', 'unidad_id', 'stock'], 'required'],
            [['descripcion'], 'string'],
            [['precio_costo', 'precio_venta'], 'number'],
            [['empresa_id', 'unidad_id', 'stock'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nombre'], 'string', 'max' => 255],
            [['unidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unidades::className(), 'targetAttribute' => ['unidad_id' => 'id']],
            [['empresa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['empresa_id' => 'id']],
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
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'precio_costo' => 'Precio Costo',
            'precio_venta' => 'Precio Venta',
            'empresa_id' => 'Empresa ID',
            
            'unidad_id' => 'Unidad ID',
            'stock' => 'Stock',
            'created_at' => 'Creado En',
            'updated_at' => 'Actualizar En',
        ];
    }

    /**
     * Gets query for [[CompraDetalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompraDetalles()
    {
        return $this->hasMany(CompraDetalle::className(), ['producto_id' => 'id']);
    }

    /**
     * Gets query for [[Empresa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['id' => 'empresa_id']);
    }

    /**
     * Gets query for [[Unidad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnidad()
    {
        return $this->hasOne(Unidades::className(), ['id' => 'unidad_id']);
    }
    public function getUnidadesesList()
{
    $unidadeses = unidades::find()->all();

    $unidadesesList = ArrayHelper::map($unidadeses, 'id', 'descrpcion');

    return $unidadesesList;
}
 /**
     * @return \yii\db\ActiveQuery
     */
   
     
}
