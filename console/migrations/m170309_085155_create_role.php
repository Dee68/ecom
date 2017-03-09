<?php

use yii\db\Migration;

class m170309_085155_create_role extends Migration
{
    public function up()
    {
         $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

     $this->createTable('{{%role}}', [
             'id' =>$this->primaryKey(),
             'role_value' =>$this->smallInteger()->notNull()->defaultValue(10),
             'role_name' =>$this->string(50)->notNull()],$tableOptions);
    }

    public function down()
    {
       /* echo "m170309_085155_create_role cannot be reverted.\n";

        return false;*/
        $this->dropTable('{{%role}}');
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
