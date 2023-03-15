<?php

namespace app\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\Query;

/**
 * SurveySearch represents the model behind the search form of `app\models\Survey`.
 */
class SurveySearch extends Survey
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'rating'], 'integer'],
            [['name', 'email', 'phone', 'region', 'city', 'gender', 'comment', 'created_at', 'updated_at'], 'safe'],
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
        $query = Survey::find();

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
            'rating' => $this->rating,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        if ($this->created_at) {
            $created_at = explode(' - ', $this->created_at);
            $query->andFilterWhere(['>=', 'created_at', strtotime($created_at[0])])
                ->andFilterWhere(['<=', 'created_at', strtotime($created_at[1] . ' +1 day')]);
        }

        return $dataProvider;
    }

    public function getGenderCount(): array
    {
        $query = new Query();
        $res = $query->select(['gender', 'COUNT(*) AS count'])->from(Survey::tableName())->groupBy('gender')->all();
        $data = [];
        foreach ($res as $item) {
            $data[] = [$item['gender'], $item['count']];
        }
        return $data;
    }

    public function getCityCount(): array
    {
        $query = new Query();
        $res = $query->select(['city', 'COUNT(*) AS count'])->from(Survey::tableName())->groupBy('city')->all();
        $data = [];
        foreach ($res as $item) {
            $data[] = [$item['city'], $item['count']];
        }
        return $data;
    }
}
