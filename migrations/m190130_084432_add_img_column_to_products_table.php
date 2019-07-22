<?php

use yii\db\Migration;

/**
 * Handles adding img to table `products`.
 */
class m190130_084432_add_img_column_to_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('products', 'img', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('products', 'img');
    }
}
