<?php

namespace app\models;

use yii\base\Model;
use app\models\reester;
use yii\data\ActiveDataProvider;

class searchpatient extends reester
{
    public function rules()
    {
        return [
            [['date_of_birth', 'numbercard'], 'integer'],
            [['name', 'diagnez'], 'safe'],
        ];
    }
    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = reester::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 100, // количество элементов на странице
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC, // сортировка по умолчанию
                ]
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // Добавляем условия фильтрации
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'diagnez', $this->diagnez])
            -> andFilterWhere((['like', 'date_of_birth', $this->date_of_birth]))
            -> andFilterWhere((['like', 'numbercard', $this->numbercard]));

        return $dataProvider;
    }
}