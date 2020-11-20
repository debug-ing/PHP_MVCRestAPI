<?php

require './predis/autoload.php';

class RedisController
{
    public static $redis;
    public static function Connect(){
        Predis\Autoloader::register();
        $redis = new Predis\Client();
        $redis->connect('127.0.0.1', 6379);
    }
    public static function Check($key){
        $redis =  new Predis\Client();
        $data = $redis->get($key);
        if ($data == "" || $data == null){
            return false;
        }else{
            return true;
        }
    }
    public static function Add($key,$value){
        $redis =  new Predis\Client();
        $redis->set($key,$value);
        $redis->expire($key, 3600);
    }
    public static function Get($key){
        $redis =  new Predis\Client();
        $data = $redis->get($key);
        return $data;
    }
}