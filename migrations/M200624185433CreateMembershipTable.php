<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200624185433CreateMembershipTable
 */
class M200624185433CreateMembershipTable extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('membership', [
            'id' => $this->primaryKey(),
            'direction_id' => $this->integer()->notNull(), // FK to table 'direction'
            'trainer_id' => $this->integer(), // FK to table 'trainer'
            'rate' => $this->integer(),
            'salary' => $this->float(),
            'cost' => $this->float()->notNull(),
            'limited' => $this->boolean()->notNull(),
            'count' => $this->integer(),
        ]);

        // creates index for column `direction_id` in table `membership`
        $this->createIndex(
            'idx-membership-direction_id',
            'membership',
            'direction_id'
        );
        // add foreign key for table `direction`
        $this->addForeignKey(
            'fk-membership-direction_id',
            'membership',
            'direction_id',
            'direction',
            'id'
        );

        // creates index for column `trainer_id` in table `membership`
        $this->createIndex(
            'idx-membership-trainer_id',
            'membership',
            'trainer_id'
        );
        // add foreign key for table `trainer`
        $this->addForeignKey(
            'fk-membership-trainer_id',
            'membership',
            'trainer_id',
            'trainer',
            'id'
        );
    }

    public function down()
    {
        $this->dropTable('membership');

        // drops foreign key for table `membership`
        $this->dropForeignKey(
            'fk-membership-direction_id',
            'membership'
        );
        // drops index for column `direction_id`
        $this->dropIndex(
            'idx-membership-direction_id',
            'membership'
        );

        // drops foreign key for table `membership`
        $this->dropForeignKey(
            'fk-membership-trainer_id',
            'membership'
        );
        // drops index for column `trainer_id`
        $this->dropIndex(
            'idx-membership-trainer_id',
            'membership'
        );
    }
}
