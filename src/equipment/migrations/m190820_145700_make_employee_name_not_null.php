<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee}}`.
 */
class m190820_145700_make_employee_name_not_null extends Migration
{
    protected $table = 'employee';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn($this->table, 'name', $this->string()->notNull());
        $this->addColumn($this->table, 'employee_no', $this->string());
        $this->addColumn($this->table, 'working_status', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn($this->table, 'working_status');
        $this->dropColumn($this->table, 'employee_no');
        $this->alterColumn($this->table, 'name', $this->string());
    }
}
