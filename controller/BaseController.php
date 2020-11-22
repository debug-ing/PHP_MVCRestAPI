<?php


class BaseController
{
    public static function GetPDO($host,$dbname,$username,$password){
        $pdo = new PDO("mysql:dbname=$dbname;host=$host", $username, $password);
        $pdo->exec("SET CHARACTER SET utf8");
        return $pdo;
    }
    public static function JsonResponseOKList($code,$message,$data,$count){
        return json_encode( (object) ['code'=>$code,'message'=>$message,"data"=>$data,'count'=>$count]);
    }
    public static function JsonResponseError($code,$message){
        return json_encode( (object) ['code'=>$code,'message'=>$message]);
    }
    public static function JsonResponseInsert($code,$message,$count,$data){
        return json_encode( (object) ['code'=>$code,'message'=>$message,'Data'=>$data,'count'=>$count]);
    }
    public static function JsonResponseDelete($code,$message,$id){
        return json_encode( (object) ['code'=>$code,'message'=>$message,'Deleted-id'=>$id]);
    }
    public static function JsonResponseUpdate($code,$message,$id){
        return json_encode( (object) ['code'=>$code,'message'=>$message,'Update-id'=>$id]);
    }
    public static function SetHeader(){
        header('Content-Type: application/json');
    }
}