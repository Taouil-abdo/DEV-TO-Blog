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
        }

    }

    public static function logoutview()
    {
          if(isset($_POST['logout'])){
              session_start();
              session_destroy();
              header("Location: ../../index.php");
              exit;
          }
          
    }

    public static function getUserById(){
           session_start();
           $id= $_SESSION['id'];
            $result = Users::getUserById($id);
            return $result;

    }

    public static function updateUserProfile(){
        
        if(isset($_POST['updateProfile'])){

               
               $userName = $_POST['username'];
               $email = $_POST['email'];
               $bio = $_POST['bio'];
               $password = $_POST['password'];
               $id = $_SESSION['id'];

               $profileImage = $_FILES['profileImage']['name'];
               $temp_file = $_FILES['profileImage']['tmp_name'];
               $folder = __DIR__ . "/../asset/uploads/users/$profileImage";

               $result = Users::updateProfile($userName, $email, $password, $profileImage ,$bio ,$id);
               var_dump($result);

               return $result;
               if($result){
                header("Location : ../view/pages/Profile/profile.php");
               }
        }
    }


public static function deleteUser(){

    if (isset($_POST['deleteUser']) ) {
        $UserId = $_POST["UserId"];
        $result=Users::deleteUser($UserId);
        return $result;
        if($result){
        header("refresh:1");
        }else{
            echo "Sorry Somthing Wrong";
        }

    }

    
    
}

public static function updateUserStatus() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateUser'])) {

            $id = $_POST['UserId'] ;
            $role = $_POST['role'] ;

            if ($id && $role) {
                $result = Users::updateUserRole($role, $id);
                header("refresh:0");
            } else {
                echo "Error: Missing UserId or role data.";
            }
        }
}


public static function checkRole($requiredRole) {
    session_start();
    if (!isset($_SESSION["role"]) || $_SESSION["role"] !== $requiredRole) {
        header("Location: ../Dashboard/Error404.php");
        exit;
    }
}

}