<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200624194336AlterColumnNameInTableMembership
 */
class M200624194336AlterColumnNameInTableMembership extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('membership', 'name', 'string not null');
    }

    public function down()
    {
        $this->dropColumn('membership', 'name');
    }
}
