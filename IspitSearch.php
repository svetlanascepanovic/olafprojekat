<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ispit;

/**
 * IspitSearch represents the model behind the search form about `app\models\Ispit`.
 */
class IspitSearch extends Ispit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ispit', 'id_predmet', 'id_dijete'], 'integer'],
            [['datum', 'ocjena'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Ispit::find();

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
            'id_ispit' => $this->id_ispit,
            'id_predmet' => $this->id_predmet,
            'id_dijete' => $this->id_dijete,
            'datum' => $this->datum,
        ]);

        $query->andFilterWhere(['like', 'ocjena', $this->ocjena]);

        return $dataProvider;
    }
}
