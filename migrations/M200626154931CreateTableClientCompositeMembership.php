<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200626154931CreateTableClientCompositeMembership
 */
class M200626154931CreateTableClientCompositeMembership extends Migration
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
        echo "M200626154931CreateTableClientCompositeMembership cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('client_composite_membership', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'client_id' => $this->integer()->notNull(), // FK to 'client'
        ]);

        $this->createIndex(
            'idx-client_cm__client_id',
            'client_composite_membership',
            'client_id',
        );

        $this->addForeignKey(
            'fk-client_cm-client',
            'client_composite_membership',
            'client_id',
            'client',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {

        // drop foreign key to table 'client_composite_membership_membership_collection_id'
        $this->dropForeignKey(
            'fk-client_cm-client',
            'client_composite_membership'
        );
        
        // drop index for column 'client_id'
        $this->dropIndex(
            'idx-client_cm__client_id',
            'client_composite_membership'
        );

        $this->dropTable('client_composite_membership');
    }
}
