<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property int $id
 * @property int $role_value
 * @property string $role_name
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_value'], 'integer'],
            [['role_name'], 'required'],
            [['role_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_value' => 'Role Value',
            'role_name' => 'Role Name',
        ];
    }
     /**
    *@ entails the relationship btw the user & role models
    */
    public function getUsers()
    {
      return $this->hasMany(User::className(),['role_id'=>'role_value']);
    }
}
