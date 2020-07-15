<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200712130520AlterColumnArchiveInTableTrainer
 */
class M200712130520AlterColumnArchiveInTableTrainer extends Migration
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
        echo "M200712130520AlterColumnArchiveInTableTrainer cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->alterColumn('trainer', 'archive', $this->boolean()->notNull()->defaultValue(0));
    }

    public function down()
    {
        echo "M200712130520AlterColumnArchiveInTableTrainer cannot be reverted.\n";

        return false;
    }
}
