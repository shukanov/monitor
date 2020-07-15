<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200622144022CreateTableClient
 */
class M200622144022CreateTableClient extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "M200622144022CreateTableClient cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('client', [
            'id'                     => $this->primaryKey(),
            'qr_code'                => $this->string()->notNull(),
            'first_name'             => $this->string()->notNull(),
            'second_name'            => $this->string()->notNull(),
            'patronymic'             => $this->string()->notNull(),
            'phone'                  => $this->string()->notNull(),
            'registration_date'      => $this->date()->notNull(),
            'last_activity_datetime' => $this->dateTime()->notNull(),
            'email'                  => $this->string(),
            'birth_date'             => $this->date(),
            'gender'                 => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('client');
    }
}
