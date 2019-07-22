<?php

use yii\db\Migration;

/**
 * Handles the creation of table `alvs_users`.
 */
class m190103_102536_create_alvs_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('alvs_users', [
            'id'        => $this->primaryKey(),
            'f_name'    => $this->string()->notNUll(),
            's_name'    => $this->string()->notNUll(),
            'email'     => $this->string()->notNUll(),
            'location'  => $this->string()->notNUll(),
            'phone'     => $this->string()->notNUll(),
            'password'  => $this->string()->notNUll(),
            'auth_key'  => $this->string()->notNUll(),
            'role'      => $this->string()->notNUll(),
            'hash'      => $this->text()->notNUll(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('alvs_users');
    }
}
