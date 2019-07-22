<?php

use yii\db\Migration;

/**
 * Handles adding gender to table `alvs_users`.
 */
class m190104_193805_add_gender_column_to_alvs_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('alvs_users', 'gender', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('alvs_users', 'gender');
    }
}
