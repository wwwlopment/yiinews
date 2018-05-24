<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comments`.
 */
class m180522_194614_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comments', [
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
        $this->dropTable('comments');
    }
}
