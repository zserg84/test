<?php

use yii\db\Migration;

/**
 * Class m180622_082638_create_users
 */
class m180622_082638_create_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'password_hash' => $this->string()->notNull(),
            'auth_key' => $this->string(),
            'access_token' => $this->string(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->unsigned()->notNull(),
            'updated_at' => $this->integer()->unsigned()->notNull(),
        ]);

        $this->insert('{{%user}}', [
            'username' => 'test',
            'email' => 'test@test.ru',
            'auth_key' => '1-key',
            'password_hash' => '1-hash',
            'access_token' => '1-token',
            'status' => \base\entities\User::STATUS_ACTIVE,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180622_082638_create_users cannot be reverted.\n";

        return false;
    }
    */
}
