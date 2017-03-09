<?php

use yii\db\Migration;

class m170309_094428_create_profile extends Migration
{
    public function up()
    {
     $tableOptions = null;
     if($this->db->driverName === 'mysql'){
         $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
     }
     $this->createTable('{{%profile}}', [
         'id' =>$this->primaryKey(),
         'user_id' =>$this->integer()->notNull(),
         'gender_id' =>$this->integer()->notNull(),
         'firstname' =>$this->string(30)->notNull(),
         'lastname' =>$this->string(30)->notNull(),
         'created_at' =>$this->integer(11),
         'updated_at' =>$this->integer(11),
         'avatar' =>$this->string()
     ], $tableOptions);
     //create index user_id
     $this->createIndex('idx-profile-user_id', 'profile','user_id');
     //create index gender_id
     $this->createIndex('idx-profile-gender_id', 'profile', 'gender_id');
     //add foreign key for user table
     $this->addForeignKey('fk-profile-user_id', 'profile', 'user_id', 'user', 'id', 'CASCADE');
     //add foreign key for gender table
     $this->addForeignKey('fk-profile-gender_id', 'profile', 'gender_id', 'gender', 'id');
    }

    public function down()
    {
        /*echo "m170309_094428_create_profile cannot be reverted.\n";

        return false;*/
        $this->dropForeignKey('fk-profile-user_id', 'profile');
        $this->dropForeignKey('fk-profile-gender_id', 'profile');
        $this->dropIndex('idx-profile-user_id', 'profile');
        $this->dropIndex('idx-profile-gender_id', 'profile');
        $this->dropTable('profile');
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
