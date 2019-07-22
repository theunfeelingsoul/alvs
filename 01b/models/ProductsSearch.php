<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Products;

/**
 * ProductsSearch represents the model behind the search form of `app\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['p_name', 'p_company', 'p_key_features', 'p_price', 'p_discount', 'p_cat1', 'p_cat2', 'p_cat3', 'p_sizes', 'p_url', 'p_color', 'p_description'], 'safe'],
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
        $query = Products::find();

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

        $query->andFilterWhere(['like', 'p_name', $this->p_name])
            ->andFilterWhere(['like', 'p_company', $this->p_company])
            ->andFilterWhere(['like', 'p_key_features', $this->p_key_features])
            ->andFilterWhere(['like', 'p_price', $this->p_price])
            ->andFilterWhere(['like', 'p_discount', $this->p_discount])
            ->andFilterWhere(['like', 'p_cat1', $this->p_cat1])
            ->andFilterWhere(['like', 'p_cat2', $this->p_cat2])
            ->andFilterWhere(['like', 'p_cat3', $this->p_cat3])
            ->andFilterWhere(['like', 'p_sizes', $this->p_sizes])
            ->andFilterWhere(['like', 'p_url', $this->p_url])
            ->andFilterWhere(['like', 'p_color', $this->p_color])
            ->andFilterWhere(['like', 'p_description', $this->p_description]);

        return $dataProvider;
    }
}
