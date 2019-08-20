<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lending_history}}`.
 */
class m190820_150253_drop_lending_status_column_on_lending_history_table extends Migration
{
    protected $table = 'lending_history';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->table, 'borrower_name', $this->string());
        $this->alterColumn($this->table, 'equipment_id', $this->integer()->notNull());
        $this->dropColumn($this->table, 'lending_status');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn($this->table, 'lending_status', $this->integer());
        $this->alterColumn($this->table, 'equipment_id', $this->integer());
        $this->dropColumn($this->table, 'borrower_name');
    }
}
