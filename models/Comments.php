<?php
namespace app\models;
use Yii;
/**
 * This is the model class for table "news_comments".
 *
 * @property int $id
 * @property int $news_id
 * @property string $comment
 * @property string $date
 * @property string $author_name
 */
class Comments extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'comments';
  }
  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['news_id'], 'integer'],
      [['date'], 'safe'],
      [['comment', 'author_name'], 'string', 'max' => 255,],
      [['comment', 'author_name'], 'required'],
    ];
  }
  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'news_id' => 'News ID',
      'comment' => 'Comment',
      'date' => 'Date',
      'author_name' => 'Author Name',
    ];
  }
}