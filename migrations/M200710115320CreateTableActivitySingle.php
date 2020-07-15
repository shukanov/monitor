<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200710115320CreateTableActivitySingle
 */
class M200710115320CreateTableActivitySingle extends Migration
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
        echo "M200710115320CreateTableActivitySingle cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('activity_single', [
            'id'    => $this->primaryKey(),
            'client_id' => $this->integer(),
            'membership_id' => $this->integer()->notNull(),
            'is_enter' => $this->boolean()->notNull(),
            'datetime' => $this->dateTime()->notNull(),
        ]);

        $this->createIndex(
            'idx-activity_single__client_id',
            'activity_single',
            'client_id',
        );

        $this->createIndex(
            'idx-activity_single__membership_id',
            'activity_single',
            'membership_id',
        );

        $this->addForeignKey(
            'fk-activity_single-client',
            'activity_single',
            'client_id',
            'client',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-activity_single-membership',
            'activity_single',
            'membership_id',
            'membership',
            'id',
            'CASCADE',
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-activity_single-membership',
            'activity_single'
        );

        $this->dropForeignKey(
            'fk-activity_single-client',
            'activity_single'
        );

        $this->dropIndex(
            'idx-activity_single__membership_id',
            'activity_single'
        );

        $this->dropIndex(
            'idx-activity_single__client_id',
            'activity_single'
        );

        $this->dropTable('activity_single');
    }
}
