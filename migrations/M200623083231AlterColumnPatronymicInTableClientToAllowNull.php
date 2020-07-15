<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200623083231AlterColumnPatronymicInTableClientToAllowNull
 */
class M200623083231AlterColumnPatronymicInTableClientToAllowNull extends Migration
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
        echo "M200623083231AlterColumnPatronymicInTableClientToAllowNull cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->alterColumn('client', 'patronymic', 'string');
    }

    public function down()
    {
        echo "M200623083231AlterColumnPatronymicInTableClientToAllowNull cannot be reverted.\n";

        return false;
    }
}
