<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200622132824CreateTrainerTable
 */
class M200622132824CreateTrainerTable extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('trainer', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('trainer');
    }
}
