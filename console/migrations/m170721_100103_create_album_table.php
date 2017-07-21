<?php

use yii\db\Migration;

/**
 * Handles the creation of table `album`.
 */
class m170721_100103_create_album_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('album', [
            'id' => $this->primaryKey(),
            'description' => $this->text(),
            'date' => $this->date(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('album');
    }
}
