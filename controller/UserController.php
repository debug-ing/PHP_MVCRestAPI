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
    public static function AddUser($name,$last_name,$comment){
        try {
            $pdo = BaseController::GetPDO(dbConfig::$host, dbConfig::$dbname, dbConfig::$username, dbConfig::$password);
            $data = UserModel::add($pdo,$name,$last_name,$comment);
            echo BaseController::JsonResponseInsert(200,"ok",UserModel::getCount($pdo),UserModel::get($pdo,$data));
        }catch (Exception $ex){
            echo BaseController::JsonResponseError(500,$ex->getMessage());
        }
    }
    public static function DeleteUser($id){
        try{
            $pdo = BaseController::GetPDO(dbConfig::$host, dbConfig::$dbname, dbConfig::$username, dbConfig::$password);
            UserModel::delete($pdo,$id);
            echo BaseController::JsonResponseDelete(200,"OK",$id);
        }catch (Exception $ex){
            echo BaseController::JsonResponseError(500,$ex->getMessage());
        }
    }
    public static function GetUser($id){
        try {
            $pdo = BaseController::GetPDO(dbConfig::$host, dbConfig::$dbname, dbConfig::$username, dbConfig::$password);
            $data = UserModel::get($pdo,$id);
            echo BaseController::JsonResponseOKList(200, "OK", $data, "1");
        }catch (Exception $ex){
            echo BaseController::JsonResponseError(500,$ex->getMessage());
        }
    }
}
?>