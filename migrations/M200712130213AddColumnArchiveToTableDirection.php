<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200712130213AddColumnArchiveToTableDirection
 */
class M200712130213AddColumnArchiveToTableDirection extends Migration
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
        echo "M200712130213AddColumnArchiveToTableDirection cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('direction', 'archive', $this->string()->notNull()->defaultValue(0));
    }

    public function down()
    {
        echo "M200712130213AddColumnArchiveToTableDirection cannot be reverted.\n";

        return false;
    }
}
