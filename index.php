<?php
    include_once 'utils/Route.php';
    include_once 'controller/UserController.php';
    include_once 'controller/BaseController.php';
    ROUTE::get('/api/getUsers',function(){
        BaseController::SetHeader();
        UserController::GetAllUser();
    });
    ROUTE::go('get','/api/getUser/{id:^\d*$}',function($id){
        BaseController::SetHeader();
        if(isset($id)){
            UserController::GetUser($id);
        }else{
            echo BaseController::JsonResponseError(500,"Please Send ID");
        }
    });
    ROUTE::get('/api/search',function(){
        $name = "";
        $last_name = "";
        BaseController::SetHeader();
        if(isset($_GET["name"]) || isset($_GET["last_name"])){
            if(isset($_GET["name"])){
                $name = $_GET["name"];
            }
            if(isset($_GET["last_name"])){
                $last_name = $_GET["last_name"];
            }
            if ($name == "" && $last_name == ""){
                echo BaseController::JsonResponseError(500,"Please Send Values");
            }else {
                UserController::SearchUser($name, $last_name);
            }
        }else{
            echo BaseController::JsonResponseError(500,"Please Send Values");
        }
    });
    ROUTE::post('/api/addUser',function(){
        BaseController::SetHeader();
        if(isset($_POST["name"]) && isset($_POST["last_name"]) && isset($_POST["comment"])){
            UserController::AddUser($_POST["name"],$_POST["last_name"],$_POST["comment"]);
        }else{
            echo BaseController::JsonResponseError(500,"Please Send Values");
        }
    });
    ROUTE::post('/api/deleteUser',function (){
        BaseController::SetHeader();
        if(isset($_POST["id"])){
            $id = $_POST["id"];
            UserController::DeleteUser($id);
        }else{
            echo BaseController::JsonResponseError(500,"Please Send ID");
        }
    });
    ROUTE::post('/api/updateUser',function (){
        BaseController::SetHeader();
        if(isset($_POST["id"])){
            $id = $_POST["id"];
            UserController::DeleteUser($id);
        }else{
            echo BaseController::JsonResponseError(500,"Please Send ID");
        }
    });
    if(!ROUTE::$founded){
        echo BaseController::JsonResponseError(404,"Not Found");
    }
