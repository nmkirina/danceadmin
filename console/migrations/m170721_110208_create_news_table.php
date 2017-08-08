<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m170721_110208_create_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'text' => $this->text(),
            'photo' => $this->string(),
            'fullurl' => $this->string(),
            'date' => $this->date(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news');
    }
}
