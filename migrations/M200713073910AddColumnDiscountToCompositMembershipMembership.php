<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200713073910AddColumnDiscountToCompositMembershipMembership
 */
class M200713073910AddColumnDiscountToCompositMembershipMembership extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('composite_membership_membership', 'discount', 'int');
    }

    public function down()
    {
        $this->dropColumn('composite_membership_membership', 'discount');
    }
}
