<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200627185222CreateCompositeMembershipTable
 */
class M200627185222CreateCompositeMembershipTable extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('composite_membership', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'archived' => $this->boolean()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('composite_membership');
    }
}
