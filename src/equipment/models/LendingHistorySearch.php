<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LendingHistory;

/**
 * LendingHistorySearch represents the model behind the search form of `app\models\LendingHistory`.
 */
class LendingHistorySearch extends LendingHistory
{
    public $equipmentCode;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'employee_id', 'equipment_id'], 'integer'],
            [['lending_date', 'return_date', 'remarks', 'borrower_name'], 'safe'],
            [['employeeName', 'equipmentCode'], 'safe'],
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
        $query = LendingHistory::find();

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
            'employee_id' => $this->employee_id,
            'equipment_id' => $this->equipment_id,
            'lending_date' => $this->lending_date,
            'return_date' => $this->return_date,
        ]);

        $query->andFilterWhere(['ilike', 'remarks', $this->remarks])
            ->andFilterWhere(['ilike', 'borrower_name', $this->borrower_name]);

        return $dataProvider;
    }
}
