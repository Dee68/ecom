<?php

use yii\db\Migration;

class m170309_092112_create_userType extends Migration
{
    public function up()
    {
     $tableOptions = null;
    if ($this->db->driverName === 'mysql') {
     $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        }
       $this->createTable('{{%user_type}}', [
           'id' =>$this->primaryKey(),
           'user_type_value' =>$this->smallInteger()->notNull()->defaultValue(10),
           'user_type_name' => $this->string()->notNull()
       ], $tableOptions);
    }

    public function down()
    {
        /*echo "m170309_092112_create_userType cannot be reverted.\n";

        return false;*/
        $this->dropTable('{{%user_type}}');
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
