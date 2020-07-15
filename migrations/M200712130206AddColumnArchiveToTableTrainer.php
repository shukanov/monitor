<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200712130206AddColumnArchiveToTableTrainer
 */
class M200712130206AddColumnArchiveToTableTrainer extends Migration
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
        echo "M200712130206AddColumnArchiveToTableTrainer cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('trainer', 'archive', $this->string()->notNull()->defaultValue(0));
    }

    public function down()
    {
        echo "M200712130206AddColumnArchiveToTableTrainer cannot be reverted.\n";

        return false;
    }
}
