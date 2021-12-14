<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Compras;

/**
 * ComprasSearch represents the model behind the search form of `backend\models\Compras`.
 */
class ComprasSearch extends Compras
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pedido_id','producto_id', 'factura_id',  'iva'], 'integer'],
            [['subtotal', 'total'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
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
    public function search($params, $pedido_id = null)

    {
        if ($pedido_id)
        $query = Compras::find()->where(['pedido_id' => $pedido_id]);
        else
        $query = Compras::find();

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
            'pedido_id' => $this->pedido_id,
            'producto_id' => $this->producto_id,
            'factura_id' => $this->factura_id,
            
            'subtotal' => $this->subtotal,
            'iva' => $this->iva,
            'total' => $this->total,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
