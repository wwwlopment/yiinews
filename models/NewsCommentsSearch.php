<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NewsComments;
/**
 * NewsCommentsSearch represents the model behind the search form of `app\models\NewsComments`.
 */
class NewsCommentsSearch extends NewsComments
{
  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['id', 'news_id'], 'integer'],
      [['comment', 'date', 'author_name'], 'safe'],
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
    $query = NewsComments::find();
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
      'news_id' => $this->news_id,
      'date' => $this->date,
    ]);
    $query->andFilterWhere(['like', 'comment', $this->comment])
      ->andFilterWhere(['like', 'author_name', $this->author_name]);
    return $dataProvider;
  }
}