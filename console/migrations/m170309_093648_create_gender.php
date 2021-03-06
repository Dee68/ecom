<?php

use yii\db\Migration;

class m170309_093648_create_gender extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql'){
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%gender}}', [
            'id'=>$this->primaryKey(),
            'gender_name' =>$this->string()->notNull()
        ], $tableOptions);

    }

    public function down()
    {
        echo "m170309_093648_create_gender cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
