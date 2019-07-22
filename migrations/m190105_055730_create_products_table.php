<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products`.
 */
class m190105_055730_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'p_name' => $this->string(),
            'p_company' => $this->string(),
            'p_key_features' => $this->text(),
            'p_price' => $this->string(),
            'p_discount' => $this->string(),
            'p_cat1' => $this->string(),
            'p_cat2' => $this->string(),
            'p_cat3' => $this->string(),
            'p_sizes' => $this->string(),
            'p_url' => $this->string(),
            'p_color' => $this->string(),
            'p_description' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('products');
    }
}
