<?php
 namespace App\Controllers;
 require_once __DIR__ . '/../../vendor/autoload.php';
 use App\Models\Users;


class UsersController{


    public static function show(){
        $UsersModel = Users::showUsers();
        return $UsersModel;
    }


    public static function CountUsers(){
        $Users = Users::countUsers();
        return $Users;
    }


      public function login(){

          



      }



      public function register(){


        if(isset($_POST['register']) && $_SERVER['REQUEST_METHOD']=='POST'){


            $userName = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $bio = $_POST['bio'];

            $hh = Users::register($userName,$email,$password,$bio);


        }



      }



    


}