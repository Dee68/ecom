<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property int $id
 * @property int $status_value
 * @property string $status_name
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_value'], 'integer'],
            [['status_name'], 'required'],
            [['status_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_value' => 'Status Value',
            'status_name' => 'Status Name',
        ];
    }
     /**
    *@entails the relationship btw the status & user tables
    */
    public function getUsers()
    {
      return $this->hasMany(User::className(),['status_id'=>'status_value']);
    }
}
