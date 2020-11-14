<?php
include_once 'BaseController.php';
include_once './config/dbConfig.php';
include_once './model/UserModel.php';
class UserController
{
    public static function GetAllUser(){
        try {
            $pdo = BaseController::GetPDO(dbConfig::$host, dbConfig::$dbname, dbConfig::$username, dbConfig::$password);
            $data = UserModel::getAll($pdo);
            echo BaseController::JsonResponseOKList(200, "OK", $data, UserModel::getCount($pdo));
        }catch (Exception $ex){
            echo BaseController::JsonResponseError(500,$ex->getMessage());
        }
    }
    public static function AddUser(){
        try {
            $pdo = BaseController::GetPDO(dbConfig::$host, dbConfig::$dbname, dbConfig::$username, dbConfig::$password);
            $data = UserModel::add($pdo,$_POST['name'],$_POST['lname'],$_POST['comment']);
        }catch (Exception $ex){
            echo BaseController::JsonResponseError(500,$ex->getMessage());
        }
    }
    public static function DeleteUser(){
        try{

        }catch (Exception $ex){

        }
    }
}
?>