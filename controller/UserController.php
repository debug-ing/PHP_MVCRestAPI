<?php
include_once 'BaseController.php';
include_once './config/dbConfig.php';
include_once './model/UserModel.php';
include_once 'RedisController.php';
class UserController
{
    public static function GetAllUser(){
            try {
                RedisController::Connect();
                if (RedisController::Check("all_user") == false){
                    $pdo = BaseController::GetPDO(dbConfig::$host, dbConfig::$dbname, dbConfig::$username, dbConfig::$password);
                    $data = UserModel::getAll($pdo);
                    $data =  BaseController::JsonResponseOKList(200, "OK", $data, UserModel::getCount($pdo));
                    RedisController::Add("all_user",$data);
                    echo $data;
                }else{
                    echo RedisController::Get("all_user");
                }
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
    public static function SearchUser($name,$last_name){
        try {
            $pdo = BaseController::GetPDO(dbConfig::$host, dbConfig::$dbname, dbConfig::$username, dbConfig::$password);
            $data = UserModel::search($pdo,$name,$last_name);
            echo BaseController::JsonResponseOKList(200, "OK", $data, UserModel::getCountSearch($pdo,$name,$last_name));
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

}
?>