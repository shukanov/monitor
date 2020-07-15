<?php

namespace micro\migrations;

use yii\db\Migration;

/**
 * Class M200712111210AddColumnAuthKeyToTableAdministrator
 */
class M200712111210AddColumnAuthKeyToTableAdministrator extends Migration
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
        echo "M200712111210AddColumnAuthKeyToTableAdministrator cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('administrator','auth_key', $this->string());
    }

    public function down()
    {
        echo "M200712111210AddColumnAuthKeyToTableAdministrator cannot be reverted.\n";

        return false;
    }
}
