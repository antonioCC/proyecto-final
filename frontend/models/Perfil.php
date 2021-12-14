<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\User;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\db\Expression;




/**
 * This is the model class for table "perfil".
 *
 * @property int $id
 * @property int $user_id
 * @property string $nombres
 * @property string $apellidos
 * @property string $fecha_nacimiento
 * @property string $created_at
 * @property string $updated_at
 * @property string $direccion
 * @property string $telefono
 * @property int $genero_id
 *
 * @property Genero $genero
 * @property User $user
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'nombres', 'apellidos', 'fecha_nacimiento', 'direccion', 'telefono', 'genero_id'], 'required'],
            [['user_id', 'genero_id'], 'integer'],
            
            [['genero_id'],'in', 'range'=>array_keys($this->getGeneroLista())],
            [['nombres', 'apellidos', 'direccion'], 'string'],
            [['fecha_nacimiento', 'created_at', 'updated_at'], 'safe'],
            [['fecha_nacimiento'], 'date', 'format'=>'php:Y-m-d'],
           
            [['telefono'], 'string', 'max' => 20],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['genero_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genero::className(), 'targetAttribute' => ['genero_id' => 'id']],
        ];
    }
        /**
        * behaviors
        */

        public function behaviors()
        {
            return [
                'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                                ],
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
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'genero_id' => 'Genero ID',
            'generoNombre' => Yii::t('app', 'Genero'),
            'userLink' => Yii::t('app', 'User'),
            'perfilIdLink' => Yii::t('app', 'Perfil'),
        ];
    }

    /**
     * Gets query for [[Genero]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenero()
    {
        return $this->hasOne(Genero::className(), ['id' => 'genero_id']);
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
    /**
    * @return \yii\db\ActiveQuery
    */
    public function getGeneroNombre()
    {
        return $this->genero->genero_nombre;
    }
    
    /**
    * get lista de generos para lista desplegable
    */
    public static function getGeneroLista()
    {
        $droptions = Genero::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'id', 'genero_nombre');
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    
    /**
    * @get Username
    */
    public function getUsername()
    {
          return $this->user->username;
    }
    /**
    * @getUserId
    */
    public function getUserId()
    {
         return $this->user ? $this->user->id : 'none';
    }

    /**
    * @getUserLink
    */

    public function getUserLink()
    {
         $url = Url::to(['user/view', 'id'=>$this->UserId]);
         $opciones = [];

         return Html::a($this->getUserName(), $url, $opciones);
    }
    /**
    * @getProfileLink
    */
    public function getPerfilIdLink()
    {
         $url = Url::to(['perfil/update', 'id'=>$this->id]);
         $opciones = [];
         return Html::a($this->id, $url, $opciones);
    }
   
}
