<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Equipment;

/**
 * EquipmentSearch represents the model behind the search form of `app\models\Equipment`.
 */
class EquipmentSearch extends Equipment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type', 'payment_amount'], 'integer'],
            [['code', 'name', 'model_number', 'serial_number', 'specification', 'accessory', 'remarks', 'buy_date'], 'safe'],
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
    public function search($params)
    {
        $query = Equipment::find();

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
            'type' => $this->type,
            'buy_date' => $this->buy_date,
            'payment_amount' => $this->payment_amount,
        ]);

        $query->andFilterWhere(['ilike', 'code', $this->code])
            ->andFilterWhere(['ilike', 'name', $this->name])
            ->andFilterWhere(['ilike', 'model_number', $this->model_number])
            ->andFilterWhere(['ilike', 'serial_number', $this->serial_number])
            ->andFilterWhere(['ilike', 'specification', $this->specification])
            ->andFilterWhere(['ilike', 'accessory', $this->accessory])
            ->andFilterWhere(['ilike', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
