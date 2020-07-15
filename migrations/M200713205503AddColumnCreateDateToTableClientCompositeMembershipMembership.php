<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200713205503AddColumnCreateDateToTableClientCompositeMembershipMembership
 */
class M200713205503AddColumnCreateDateToTableClientCompositeMembershipMembership extends Migration
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
        echo "M200713205503AddColumnCreateDateToTableClientCompositeMembershipMembership cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('client_composite_membership_membership', 'create_date', $this->date()->notNull());
    }

    public function down()
    {
        echo "M200713205503AddColumnCreateDateToTableClientCompositeMembershipMembership cannot be reverted.\n";

        return false;
    }
}
