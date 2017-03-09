<?php

use yii\db\Migration;

class m170309_091300_create_status extends Migration
{
    public function up()
    {
     $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%status}}', [
            'id' =>$this->primaryKey(),
            'status_value' =>$this->smallInteger()->notNull()->defaultValue(10),
            'status_name' =>$this->string(30)->notNull()
        ], $tableOptions);
    }

    public function down()
    {
        /*echo "m170309_091300_create_status cannot be reverted.\n";

        return false;*/
        $this->dropTable('{{%status}}');
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
