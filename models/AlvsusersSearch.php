<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Alvsusers;

/**
 * AlvsusersSearch represents the model behind the search form of `app\models\Alvsusers`.
 */
class AlvsusersSearch extends Alvsusers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['f_name', 's_name', 'email', 'location', 'phone', 'password', 'auth_key', 'role', 'hash'], 'safe'],
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
        $query = Alvsusers::find();

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
        ]);

        $query->andFilterWhere(['like', 'f_name', $this->f_name])
            ->andFilterWhere(['like', 's_name', $this->s_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'role', $this->role])
            ->andFilterWhere(['like', 'hash', $this->hash]);

        return $dataProvider;
    }
}
