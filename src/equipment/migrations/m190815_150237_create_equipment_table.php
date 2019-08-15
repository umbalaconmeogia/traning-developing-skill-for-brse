<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%equipment}}`.
 */
class m190815_150237_create_equipment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%equipment}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(),
            'type' => $this->integer(),
            'name' => $this->string(),
            'model_number' => $this->string(),
            'serial_number' => $this->string(),
            'specification' => $this->string(),
            'accessory' => $this->text(),
            'remarks' => $this->text(),
            'buy_date' => $this->date(),
            'payment_amount' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%equipment}}');
    }
}
