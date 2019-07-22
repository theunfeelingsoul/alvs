<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cat1`.
 */
class m190105_063101_create_cat1_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cat1', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cat1');
    }
}
