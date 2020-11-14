<?php
    include_once 'utils/Route.php';
    include_once 'controller/UserController.php';
    include_once 'controller/BaseController.php';
    ROUTE::get('/api/getUsers',function(){
        UserController::GetAllUser();
    });
    ROUTE::post('/api/addUser',function(){
        UserController::AddUser();
    });
    ROUTE::post('/api/deleteUser',function (){
        UserController::
    });
    if(!ROUTE::$founded){
        echo BaseController::JsonResponseError(404,"Not Found");
    }
