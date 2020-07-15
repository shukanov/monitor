<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200629131014CreateAdministratorTable
 */
class M200629131014CreateAdministratorTable extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('administrator', [
            'id' => $this->primaryKey(),
            'login' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('administrator');
    }
}
