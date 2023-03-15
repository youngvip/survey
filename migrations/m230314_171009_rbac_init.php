<?php

use yii\db\Migration;

/**
 * Class m230314_171009_rbac_init
 */
class m230314_171009_rbac_init extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->runAction('migrate/up', [
            'migrationPath' => '@yii/rbac/migrations',
            'interactive' => false,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230314_171009_rbac_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230314_171009_rbac_init cannot be reverted.\n";

        return false;
    }
    */
}
