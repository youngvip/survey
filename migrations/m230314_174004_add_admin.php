<?php

use app\models\User;
use yii\db\Migration;

/**
 * Class m230314_174004_add_admin
 */
class m230314_174004_add_admin extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $user = new User();
        $user->id = 1;
        $user->username = 'admin';
        $user->password = Yii::$app->security->generatePasswordHash('admin');
        $user->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        User::deleteAll(['id' => 1]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230314_174004_add_admin cannot be reverted.\n";

        return false;
    }
    */
}
