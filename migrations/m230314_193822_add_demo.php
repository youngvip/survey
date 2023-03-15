<?php

use app\models\User;
use yii\db\Migration;

/**
 * Class m230314_193822_add_demo
 */
class m230314_193822_add_demo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new User();
        $user->username = 'demo';
        $user->password = Yii::$app->security->generatePasswordHash('demo');
        $user->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        User::deleteAll(['username' => 'demo']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230314_193822_add_demo cannot be reverted.\n";

        return false;
    }
    */
}
