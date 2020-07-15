<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200710112125CreateTableActivityComposite
 */
class M200710112125CreateTableActivityComposite extends Migration
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
        echo "M200710112125CreateTableActivityComposite cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('activity_composite', [
            'id'    => $this->primaryKey(),
            'client_id' => $this->integer(),
            'membership_id' => $this->integer()->notNull(),
            'is_enter' => $this->boolean()->notNull(),
            'datetime' => $this->dateTime()->notNull(),
        ]);

        $this->createIndex(
            'idx-activity_composite__client_id',
            'activity_composite',
            'client_id',
        );

        $this->createIndex(
            'idx-activity_composite__membership_id',
            'activity_composite',
            'membership_id',
        );

        $this->addForeignKey(
            'fk-activity_composite-client',
            'activity_composite',
            'client_id',
            'client',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-activity_composite-composite_mm',
            'activity_composite',
            'membership_id',
            'composite_membership_membership',
            'id',
            'CASCADE',
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-activity_composite-composite_mm',
            'activity_composite'
        );

        $this->dropForeignKey(
            'fk-activity_composite-client',
            'activity_composite'
        );

        $this->dropIndex(
            'idx-activity_composite__client_id',
            'activity_composite'
        );

        $this->dropIndex(
            'idx-activity_composite__membership_id',
            'activity_composite'
        );

        $this->dropTable('activity_composite');
    }
}
