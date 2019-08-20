<?php

use yii\db\Migration;

/**
 * Refactoring serveral columns of equipment table.
 */
class m190820_150237_rename_equipment_type_to_category_id extends Migration
{
    protected $table = 'equipment';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn($this->table, 'type', 'category_id');
        $this->alterColumn($this->table, 'category_id', $this->integer()->notNull());
        $this->alterColumn($this->table, 'name', $this->string()->notNull());
        $this->addColumn($this->table, 'equipment_status', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn($this->table, 'equipment_status');
        $this->alterColumn($this->table, 'name', $this->string());
        $this->alterColumn($this->table, 'category_id', $this->integer());
        $this->renameColumn($this->table, 'category_id', 'type');
    }
}
