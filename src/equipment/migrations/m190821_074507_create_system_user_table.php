<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%system_user}}`.
 */
class m190821_074507_create_system_user_table extends Migration
{
    protected $table = '{{%system_user}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // $sql = "CREATE TABLE system_user (id INTEGER PRIMARY KEY AUTO INCREMENT, username VARCHAR(255) NOT NULL)";
        // $this->exec($sql);
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'password_hash' => $this->string(),
            'email' => $this->string(),
            'auth_key' => $this->string(),
            'privileges' => $this->integer(),
            'data_status' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table);
    }
}
