<?php


class BaseController
{
    public static function GetPDO($host,$dbname,$username,$password){
        $pdo = new PDO("mysql:dbname=$dbname;host=$host", $username, $password);
        $pdo->exec("SET CHARACTER SET utf8");
        return $pdo;
    }
    public static function JsonResponseOKList($code,$message,$data,$count){
        return json_encode( (object) ['code'=>$code,'message'=>$message,'count'=>$count,"data"=>$data]);
    }
    public static function JsonResponseError($code,$message){
        return json_encode( (object) ['code'=>$code,'message'=>$message]);
    }
    public static function JsonResponseInsert($code,$message,$id){
        return json_encode( (object) ['code'=>$code,'message'=>$message,'inserted-id'=>$id]);
    }
}