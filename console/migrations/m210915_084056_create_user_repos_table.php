<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_repos}}`.
 */
class m210915_084056_create_user_repos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_repo}}', [
            'id' => $this->primaryKey(),
            'hash' => $this->string(32)->notNull(),
            'url' => $this->string()->notNull(),
            'updated_at' => $this->timestamp()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_repo}}');
    }
}
