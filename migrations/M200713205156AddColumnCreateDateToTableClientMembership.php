<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200713205156AddColumnCreateDateToTableClientMembership
 */
class M200713205156AddColumnCreateDateToTableClientMembership extends Migration
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
        echo "M200713205156AddColumnCreateDateToTableClientMembership cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('client_membership', 'create_date', $this->date()->notNull());
    }

    public function down()
    {
        echo "M200713205156AddColumnCreateDateToTableClientMembership cannot be reverted.\n";

        return false;
    }
}
