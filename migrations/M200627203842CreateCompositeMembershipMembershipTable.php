<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200627203842CreateCompositeMembershipMembershipTable
 */
class M200627203842CreateCompositeMembershipMembershipTable extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('composite_membership_membership', [
            'id' => $this->primaryKey(),
            'membership_id' => $this->integer()->notNull(), // FK to table 'membership'
            'composite_membership_id' => $this->integer()->notNull(), // FK to table 'composite_membership'
            'archived' => $this->boolean()->notNull(),
        ]);

        // creates index for column `membership_id` in table `composite_membership_membership`
        $this->createIndex(
            'idx-composite_membership_membership-membership_id',
            'composite_membership_membership',
            'membership_id'
        );
        // add foreign key for table `membership`
        $this->addForeignKey(
            'fk-composite_membership_membership-membership_id',
            'composite_membership_membership',
            'membership_id',
            'membership',
            'id',
            'CASCADE'
        );

        // creates index for column `composite_membership_id` in table `composite_membership_membership`
        $this->createIndex(
            'idx-composite_membership_membership-composite_membership_id',
            'composite_membership_membership',
            'composite_membership_id'
        );
        // add foreign key for table `composite_membership`
        $this->addForeignKey(
            'fk-composite_membership_membership-composite_membership_id',
            'composite_membership_membership',
            'composite_membership_id',
            'composite_membership',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('composite_membership_membership');

        // drops foreign key for table `composite_membership_membership`
        $this->dropForeignKey(
            'fk-composite_membership_membership-membership_id',
            'composite_membership_membership'
        );
        // drops index for column `membership_id`
        $this->dropIndex(
            'idx-composite_membership_membership-membership_id',
            'composite_membership_membership'
        );

        // drops foreign key for table `composite_membership_membership`
        $this->dropForeignKey(
            'fk-composite_membership_membership-composite_membership_id',
            'composite_membership_membership'
        );
        // drops index for column `composite_membership_id`
        $this->dropIndex(
            'idx-composite_membership_membership-composite_membership_id',
            'composite_membership_membership'
        );
    }
}
