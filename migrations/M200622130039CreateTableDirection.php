<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200622130039CreateTableDirection
 */
class M200622130039CreateTableDirection extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('direction', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('direction');
    }
}
