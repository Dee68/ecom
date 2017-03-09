<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;
use backend\models\Role;
use backend\models\Status;
use backend\models\UserType;
use frontend\models\Profile;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    //const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
       /*  return [
          'timestamp'=>[
            'class'=>'yii\behaviors\TimestampBehavior',
            'attributes'=>[
              ActiveRecord::EVENT_BEFORE_INSERT=>['created_at','updated_at'],
              ActiveRecord::EVENT_BEFORE_UPDATE=>['updated_at'],
              'value'=> new Expression('NOW()'),
            ],
          ]
        ];*/
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
       /* return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];*/
        return [
          ['status_id','default','value'=>self::STATUS_ACTIVE],
          [['status_id'],'in', 'range'=>array_keys($this->getStatusList())],
          ['role_id','default','value'=>10],
          [['role_id'],'in','range'=>array_keys($this->getRoleList())],
          ['user_type_id','default','value'=>10],
          [['user_type_id'],'in','range'=>array_keys($this->getUserTypeList())],
          ['username','filter','filter'=>'trim'],
          ['username','required'],
          ['username','unique'],
          ['username','string','min'=>2,'max'=>255],
          ['email','filter','filter'=>'trim'],
          ['email','required'],
          ['email','unique'],
          ['email','email'],
        ];
    }
    public function attributeLabels() {
        //parent::attributeLabels();
        return [
        /* other attribut labels */
        'roleName' => Yii::t('app', 'Role'),
        'statusName' => Yii::t('app', 'Status'),
        'profileId' => Yii::t('app', 'Profile'),
       'profileLink' => Yii::t('app', 'Profile'),
        'userLink' => Yii::t('app', 'User'),
       'username' => Yii::t('app', 'User'),
       'userTypeName' => Yii::t('app', 'User Type'),
       'userTypeId' => Yii::t('app', 'User Type'),
      'userIdLink' => Yii::t('app', 'ID'),
      ];
    }
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status_id' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status_id' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status_id' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    /**
    *@gets the role of a user
    */
    public function getRole()
    {
      return $this->hasOne(Role::className(),['role_value'=>'role_id']);
    }
    /**
    *@get role_name
    */
    public function getRoleName()
    {
      return $this->role ? $this->role->role_name : '_ no role _';
    }
    /**
    *@get list of dropdown for roles
    */
    public function getRoleList()
    {
      $droptions = Role::find()->asArray()->all();
      return Arrayhelper::map($droptions,'role_value','role_name');
    }
    /**
    *@gets status of a user
    */
    public function getStatus()
    {
      return $this->hasOne(Status::className(),['status_value'=>'status_id']);
    }
    /**
    *@get status name
    */
    public function getStatusName()
    {
      return $this->status ? $this->status->status_name : '_ no status _';
    }
    /**
    *@ get dropdown list of statuses
    */
    public function getStatusList()
    {
      $droptions = Status::find()->asArray()->all();
      return Arrayhelper::map($droptions,'status_value','status_name');
    }
    /**
    *@ gets the usertype
    */
    public function getUserType()
    {
      return $this->hasOne(UserType::className(),['user_type_value'=>'user_type_id']);
    }
    /**
    *@ gets user type name
    */
    public function getUserTypeName()
    {
      return $this->userType ? $this->userType->user_type_name : '_ no user type _';
    }
    /**
    *@ gets the user type in a dropdown list
    */
    public function getUserTypeList()
    {
      $droptions = UserType::find()->asArray()->all();
      return Arrayhelper::map($droptions,'user_type_value','user_type_name');
    }
    /*
    *@ entails the relationship btw the user&profile tables
    */
    public function getProfile()
    {
      return $this->hasOne(Profile::className(), ['user_id' => 'id']);
    }
    /**
    *@ get profile id
    */
    public function getProfileId()
    {
     return $this->profile ? $this->profile->id : 'none';
    }
    /**
    *@ gets profile link
    */
    public function getProfileLink()
    {
     $url = Url::to(['profile/view', 'id'=>$this->profileId]);
     $options = [];
     return Html::a($this->profile ? 'profile' : 'none', $url, $options);
    }
}
