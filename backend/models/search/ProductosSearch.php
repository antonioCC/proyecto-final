<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Productos;

/**
 * ProductosSearch represents the model behind the search form of `backend\models\Productos`.
 */
class ProductosSearch extends Productos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'empresa_id', 'unidad_id', 'stock'], 'integer'],
            [['nombre', 'descripcion', 'created_at', 'updated_at'], 'safe'],
            [['precio_costo', 'precio_venta'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $empresa_id = null)
    {
        if ($empresa_id)
 $query = Productos::find()->where(['empresa_id' => $empresa_id]);
 else

        $query = Productos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'precio_costo' => $this->precio_costo,
            'precio_venta' => $this->precio_venta,
            'empresa_id' => $this->empresa_id,
            'unidad_id' => $this->unidad_id,
            'stock' => $this->stock,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
