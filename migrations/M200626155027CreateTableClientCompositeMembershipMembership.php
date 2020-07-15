<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200626155027CreateTableClientCompositeMembershipMembership
 */
class M200626155027CreateTableClientCompositeMembershipMembership extends Migration
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
        echo "M200626155027CreateTableClientCompositeMembershipMembership cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('client_composite_membership_membership', [
            'id' => $this->primaryKey(),
            'discount' => $this->integer(),
            'shalf_life' => $this->date()->notNull(),
            'membership_id' => $this->integer()->notNull(), //FK to membership table
            'client_composite_membership_id' => $this->integer()->notNull(),
        ]);

        // creates index for column 'membership_id'
        $this->createIndex(
            'idx-client_cmm__membership_id',
            'client_composite_membership_membership',
            'membership_id',
        );

        // creates index for column 'client_composite_membership_membership_collection_id'
        $this->createIndex(
            'idx-client_cmm__client_cm_id',
            'client_composite_membership_membership',
            'client_composite_membership_id',
        );

        //add foreign key to table 'membership'
        $this->addForeignKey(
            'fk-client_cmm-membership',
            'client_composite_membership_membership',
            'membership_id',
            'membership',
            'id',
            'CASCADE'
        );

        // add foreign key to table 'client_composite_membership_membership_collection'
        $this->addForeignKey(
            'fk-client_cmm-client_cm',
            'client_composite_membership_membership',
            'client_composite_membership_id',
            'client_composite_membership',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drop foreign key to table 'client_composite_membership_membership_collection'
        $this->dropForeignKey(
            'fk-client_cmm-client_cm',
            'client_composite_membership_membership'
        );

        // drop foreign key to table 'membership'
        $this->dropForeignKey(
            'fk-client_cmm-membership',
            'client_composite_membership_membership'
        );

        // drop index for column 'client_composite_membership_membership_collection_id'
        $this->dropIndex(
            'idx-client_cmm__client_cm_id',
            'client_composite_membership_membership'
        );
        
        // drop index for column 'membership_id'
        $this->dropIndex(
            'idx-client_cmm__membership_id',
            'client_composite_membership_membership'
        );

        $this->dropTable('client_composite_membership_membership');
    }
}
