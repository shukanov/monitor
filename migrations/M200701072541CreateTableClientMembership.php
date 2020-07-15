<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200701072541CreateTableClientMembership
 */
class M200701072541CreateTableClientMembership extends Migration
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
        echo "M200701072541CreateTableClientMembership cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('client_membership', [
            'id' => $this->primaryKey(),
            'discount' => $this->integer(),
            'shalf_life' => $this->date()->notNull(),
            'client_id' => $this->integer()->notNull(), // FK to 'client'
            'membership_id' => $this->integer()->notNull(), // FK to 'membership'
        ]);

        $this->createIndex(
            'idx-client_m__client_id',
            'client_membership',
            'client_id',
        );

        $this->createIndex(
            'idx-client_m__membership_id',
            'client_membership',
            'membership_id',
        );

        $this->addForeignKey(
            'fk-client_m-client',
            'client_membership',
            'client_id',
            'client',
            'id',
            'CASCADE',
        );

        $this->addForeignKey(
            'fk-client_m-membership',
            'client_membership',
            'membership_id',
            'membership',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        // drop foreign key to table 'membership'
        $this->dropForeignKey(
            'fk-client_m-membership',
            'client_membership'
        );

        // drop foreign key to table 'client'
        $this->dropForeignKey(
            'fk-client_m-client',
            'client_membership'
        );

        // drop index for column 'membership_id'
        $this->dropIndex(
            'idx-client_m__membership_id',
            'client_membership'
        );
        
        // drop index for column 'client_id'
        $this->dropIndex(
            'idx-client_m__client_id',
            'client_membership'
        );

        $this->dropTable('client_membership');
    }
}
