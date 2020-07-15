<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200623045523DropColumnLastActivityDatetimeInTableClient
 */
class M200623045523DropColumnLastActivityDatetimeInTableClient extends Migration
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
        echo "M200623045523DropColumnLastActivityDatetimeInTableClient cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->dropColumn('client', 'last_activity_datetime');
    }

    public function down()
    {
        echo "M200623045523DropColumnLastActivityDatetimeInTableClient cannot be reverted.\n";

        return false;
    }
}
