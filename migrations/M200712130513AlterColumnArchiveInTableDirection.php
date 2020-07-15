<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200712130513AlterColumnArchiveInTableDirection
 */
class M200712130513AlterColumnArchiveInTableDirection extends Migration
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
        echo "M200712130513AlterColumnArchiveInTableDirection cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->alterColumn('direction', 'archive', $this->boolean()->notNull()->defaultValue(0));
    }

    public function down()
    {
        echo "M200712130513AlterColumnArchiveInTableDirection cannot be reverted.\n";

        return false;
    }
}
