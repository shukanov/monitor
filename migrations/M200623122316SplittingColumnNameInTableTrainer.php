<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200623122316SplittingColumnNameInTableTrainer
 */
class M200623122316SplittingColumnNameInTableTrainer extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->dropColumn('trainer', 'name');
        $this->addColumn('trainer', 'first_name', 'string not null');
        $this->addColumn('trainer', 'second_name', 'string not null');
        $this->addColumn('trainer', 'patronymic', 'string');
    }

    public function down(){}
}
