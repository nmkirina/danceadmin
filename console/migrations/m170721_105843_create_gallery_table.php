<?php

use yii\db\Migration;

/**
 * Handles the creation of table `gallery`.
 */
class m170721_105843_create_gallery_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('gallery', [
            'id' => $this->primaryKey(),
            'name' => $this->tring(),
            'album' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('gallery');
    }
}
