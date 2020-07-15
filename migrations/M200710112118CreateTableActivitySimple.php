<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200710112118CreateTableActivitySimple
 */
class M200710112118CreateTableActivitySimple extends Migration
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
        echo "M200710112118CreateTableActivitySimple cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('activity_simple', [
            'id'    => $this->primaryKey(),
            'client_id' => $this->integer(),
            'membership_id' => $this->integer()->notNull(),
            'is_enter' => $this->boolean()->notNull(),
            'datetime' => $this->dateTime()->notNull(),
        ]);

        $this->createIndex(
            'idx-activity_simple__client_id',
            'activity_simple',
            'client_id',
        );

        $this->createIndex(
            'idx-activity_simple__membership_id',
            'activity_simple',
            'membership_id',
        );

        $this->addForeignKey(
            'fk-activity_simple-client',
            'activity_simple',
            'client_id',
            'client',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-activity_simple-client_m',
            'activity_simple',
            'membership_id',
            'client_membership',
            'id',
            'CASCADE',
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-activity_simple-client_m',
            'activity_simple'
        );

        $this->dropForeignKey(
            'fk-activity_simple-client',
            'activity_simple'
        );

        $this->dropIndex(
            'idx-activity_simple__membership_id',
            'activity_simple'
        );

        $this->dropIndex(
            'idx-activity_simple__client_id',
            'activity_simple'
        );

        $this->dropTable('activity_simple');
    }
}
