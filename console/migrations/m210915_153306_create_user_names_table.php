<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_names}}`.
 */
class m210915_153306_create_user_names_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_name}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(24)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_name}}');
    }
}
