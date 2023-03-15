<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%survey}}`.
 */
class m230314_184036_create_survey_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%survey}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'region' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'gender' => $this->string()->notNull(),
            'rating' => $this->integer(),
            'comment' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%survey}}');
    }
}
