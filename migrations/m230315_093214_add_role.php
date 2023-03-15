<?php

use yii\db\Migration;

/**
 * Class m230315_093214_add_role
 */
class m230315_093214_add_role extends Migration
{

    /**
     * @throws Exception
     */
    public function up()
    {
        $auth = Yii::$app->authManager;

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->assign($admin, 1);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }


}
