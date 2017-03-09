<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_type".
 *
 * @property int $id
 * @property int $user_type_value
 * @property string $user_type_name
 */
class UserType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_type_value'], 'integer'],
            [['user_type_name'], 'required'],
            [['user_type_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_type_value' => 'User Type Value',
            'user_type_name' => 'User Type Name',
        ];
    }
     /**
    *@ entails relationship btw the models user & usertype
    */
    public function getUsers()
    {
      return $this->hasMany(User::className(),['user_type_id'=>'user_type_value']);
    }
}
