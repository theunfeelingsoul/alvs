<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cat2`.
 */
class m190105_064227_create_cat2_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cat2', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'cat1_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cat2');
    }
}
