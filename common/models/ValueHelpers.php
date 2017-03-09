<?php
namespace common\models;
use yii;
/*
 * 
 */
class ValueHelpers
{
    #gets the role_value from the role_name
    public static function getRoleValue($role_name)
    {
       //connect to database
       $connection = \Yii::$app->db;
       //create query string
      $sql = "SELECT role_value FROM role WHERE role_name=:role_name";
     //execute query with bind parameter
      $command = $connection->createCommand($sql);
      $command->bindValue(":role_name",  strtolower($role_name));
      //retriev result of query in array $result
      $result = $command->queryOne();
      //return array value of assigned key
      return $result['role_value'];  
    }
    #gets the status_value from the status_name
    public static function getStatusValue($status_name)
    {
      $connection = \Yii::$app->db;
      $sql = "SELECT status_value FROM status WHERE status_name=:status_name";
      $command = $connection->createCommand($sql);
      $command->bindValue(":status_name",  strtoupper($status_name));
      $result = $command->queryOne();
      return $result['status_value'];
    }
    #gets the value from the string user_type_name
    public static function getUserTypeValue($user_type_name)
    {
      //connect to the database
       $connection = \Yii::$app->db;
      //create the query
       $sql = "SELECT user_type_value FROM user_type WHERE user_type_name=:user_type_name";
      //execute query with binding
       $command = $connection->createCommand($sql);
       $command->bindValue(":user_type_name",$user_type_name);
      //retriev result of query
       $result = $command->queryOne();
      //return array value of assigned key
     return $result['user_type_value'];
}
}
