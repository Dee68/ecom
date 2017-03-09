<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status_id' => $this->smallInteger()->notNull()->defaultValue(10),
            'role_id' => $this->smallInteger()->notNull()->defaultValue(10),
            'user_type_id' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ], $tableOptions);
        //create index for status_id
        $this->createIndex(
                'idx-user-role_id', 
                'user', 
                'role_id');
        //create index for user_type_id
        $this->createIndex(
                'idx-user-user_type_id', 
                'user',
                'user_type_id');
        //add foreign key for role table
        $this->addForeignKey(
                'fk-user-role_id', 
                'user', 
                'role_id', 
                'role',
                'role_value');
        //add forign key for user_type table
        $this->addForeignKey(
                'fk-user-user_type_id', 
                'user', 
                'user_type_id', 
                'user_type', 
                'user_type_value');
        
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
