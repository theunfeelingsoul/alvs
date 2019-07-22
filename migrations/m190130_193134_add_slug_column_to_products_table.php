<?php

use yii\db\Migration;

/**
 * Handles adding slug to table `products`.
 */
class m190130_193134_add_slug_column_to_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('products', 'slug', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('products', 'slug');
    }
}
