<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200624202205AddColumnArchivedInTableMembership
 */
class M200624202205AddColumnArchivedInTableMembership extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('membership', 'archived', 'boolean not null default 0');
    }

    public function down()
    {
        $this->dropColumn('membership', 'archived');
    }
}
