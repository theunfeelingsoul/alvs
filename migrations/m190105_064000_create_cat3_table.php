<?php

use yii\db\Migration;

/**
 * Handles the creation of table `cat3`.
 */
class m190105_064000_create_cat3_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cat3', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'cat2_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cat3');
    }
}
