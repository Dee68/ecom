<?php
namespace common\models;
use common\models\ValueHelpers;
use yii;
use yii\web\Controller;
use yii\helpers\Url;
/*
 * 
 */
class PermissionHelpers
{
    #require the role to control access
    public static function requireRole($role_name)
    {
        if(Yii::$app->user->identity->role_id == ValueHelpers::getRoleValue($role_name))
        {
            return TRUE;
        }  else {
            return FALSE;
        }
            
    }
    /*
    *@ returns true if input string is permitted
    * e.g backend alowwed for Admin and SuperAdmin
    */
    public static function requireMinimumRole($role_name)
    {
      if (Yii::$app->user->identity->role_id >= ValueHelpers::getRoleValue($role_name)) {
         return true;
        }else {
        return false;
       }
    }
   /*
    *@ require an input status_name
     *@ return true if status_name is allowed
    */
    public static function requireStatus($status_name)
    {
      if (Yii::$app->user->identity->status_id == ValueHelpers::getStatusValue($status_name)) {
       return true;
      }else {
        return false;
       }
     }
     #
    public static function requireMinimumStatus($status_name)
    {
       if (Yii::$app->user->identity->status_id >= ValueHelpers::getStatusValue($status_name)) {
       return true;
       }else {
        return false;
      }
    }
    #enables user to edit only his/her profile
    public static function userMustBeOwner($model_name,$model_id)
    {
      $connection = \Yii::$app->db;
      $userid = Yii::$app->user->identity->id;
      $sql = "SELECT id FROM $model_name WHERE user_id=:userid AND id=:model_id";
      $command = $connection->createCommand($sql);
      $command->bindValue(":userid", $userid);
      $command->bindValue(":model_id", $model_id);
      $result = $command->queryOne();
      if ($result) {
        return true;
       }else {
        return false;
      }
    }
   #e.g from free to a paid user
    public static function requireUpgradeTo($user_type_name)
    {
      if (Yii::$app->user->identity->user_type_id != ValueHelpers::getUserTypeValue($user_type_name)) {
          return Yii::getResponse()->redirect(Url::to(['upgrade/index']));
       }
    }
}
