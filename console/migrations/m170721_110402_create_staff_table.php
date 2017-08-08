<?php

use yii\db\Migration;

/**
 * Handles the creation of table `staff`.
 */
class m170721_110402_create_staff_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('staff', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'photo' => $this->string(),
            'fullurl' => $this->string(),
            'start_date' => $this->date(),
            'active' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('staff');
    }
}
