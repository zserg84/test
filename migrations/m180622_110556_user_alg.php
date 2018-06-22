<?php

use yii\db\Migration;

/**
 * Class m180622_110556_user_alg
 */
class m180622_110556_user_alg extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_alg}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'number' => $this->integer()->notNull(),
            'data' => $this->string()->notNull(),
            'result' => $this->float(10,2),
            'created_at' => $this->integer()->notNull()
        ]);
        $this->addForeignKey('fk_user_alg_user', '{{%user_alg}}', 'user_id', '{{%user}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_alg}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180622_110556_user_alg cannot be reverted.\n";

        return false;
    }
    */
}
