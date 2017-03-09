<?php
namespace common\models;
 use yii;
 /**
  *
  */
 class RecordHelpers
 {
   /*
   *@ e.g model_name = profile returns false
   * if user has'nt profile else returns id of user.
   */
   public static function userHas($model_name)
   {
     $connection = \Yii::$app->db;
     $userid = Yii::$app->user->identity->id;
     $sql = "SELECT id FROM $model_name WHERE user_id=:userid";
     $command = $connection->createCommand($sql);
     $command->bindValue(":userid",$userid);
     $result = $command->queryOne();
     if ($result == null) {
       return false;
     }else {
       return $result['id'];
     }
   }
 }

