<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news_comments`.
 */
class m180522_194614_create_news_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news_comments', [
            'id' => $this->primaryKey(),
            'news_id' => $this->integer(),
            'comment' => $this->string(),
            'date' => $this->date(),
            'author_name' => $this->string(),
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('news_comments');
    }
}
