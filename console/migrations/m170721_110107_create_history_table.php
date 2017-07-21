<?php

use yii\db\Migration;

/**
 * Handles the creation of table `history`.
 */
class m170721_110107_create_history_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('history', [
            'id' => $this->primaryKey(),
            'year' => $this->integer(),
            'text' => $this->text(),
            'name' => $this->string(),
            'description' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('history');
    }
}
