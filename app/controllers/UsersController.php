<?php
 namespace App\Controllers;
 require_once __DIR__ . '/../../vendor/autoload.php';
 use App\Models\Users;


class UsersController{


    public static function show(){
        $UsersModel = Users::showUsers();
        return $UsersModel;
    }


    


    


}