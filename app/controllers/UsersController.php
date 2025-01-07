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

    public static function register(){

        if (isset($_POST['register']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $userName = $_POST['username'];
            $bio = $_POST['bio'];
            $password = $_POST['password'];

            
            $result = Users::register($userName, $email, $password, $bio);
            if ($result) {
                header("Location: ../../view/Authentifcation/login.php");
            } else {
            echo "Error registering user.";
            }
        }
    }

    public static function login(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitLogin"])) {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = Users::loginUser($email, $password);
            var_dump($result);
        }

    }

    public static function logoutview()
    {
          if(isset($_POST['logout'])){
              session_start();
              session_destroy();
              header("Location: ../../../index.php");
              exit;
          }
          
    }

}