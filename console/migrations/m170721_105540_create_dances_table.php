<?php

use yii\db\Migration;

/**
 * Handles the creation of table `dances`.
 */
class m170721_105540_create_dances_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('dances', [
            'id' => $this->primaryKey(),
            'name' => $this->tring(),
            'photo' => $this->string(),
            'fullurl' => $this->string(),
            'description' => $this->text(),
            'start_year' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('dances');
    }
}
