<?php

namespace App\Models;

use App\Config\Database;


class Users{

    
 private static $table = "users";


public static function showUsers(){
    $query = database::getData(self::$table);
    return $query;
}

public static function countUsers(){

    $query = database::countItems(self::$table);
    return $query;
}

public static function register($userName, $email, $password, $bio)
{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $columns = "username, email, password_hash, bio";
    $values = [$userName, $email, $hashedPassword, $bio];

    $result= Database::AddUser(self::$table, $columns, $values);
    return $result; 
    if($result){

    }
}

public static function updateProfile($userName, $email, $password, $profileImage,$bio ,$id){

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $columns = "username = '$userName', email ='$email', password_hash = '$hashedPassword',profile_picture='$profileImage', bio='$bio'";

    $result = Database::update(self::$table,$columns,$id);
    var_dump($result);
    return $result; 

}

public static function loginUser($email, $password){
    session_start();

    $row = Database::findByEmail($email);

    if($row){

        $_SESSION["role"] = $row['role'];
        $_SESSION["id"] = $row['id'];
        $_SESSION["username"] = $row['username'];
        $_SESSION["email"] = $row['email'];
        
        if(password_verify($password,$row['password_hash'])){

                if($_SESSION['role'] == 'admin'){
                    header("Location: ../../view/Dashboard/dashboard.php");
                    exit;
                }elseif($_SESSION['role'] == 'user'){
                    header("Location: ../../../index.php");
                    exit;
                }elseif($_SESSION['role'] == 'author'){
                    header("Location: ../../view/Dashboard/Articles/Article.php");
                    exit;        
                }else{
                    header("Location: register.php");
                    exit;
                }
        }else{
            die("Incorrect password.");
        }
    }else{
        die("Incorrect email or password.");
    }
}

public static function getUserById($id){

     $result = Database::findById(self::$table,$id);
     return $result;
     
}

public static function deleteUser($id){

         $result = Database::DeleteItem(self::$table,$id);
         return $result;
         var_dump($result);

}

public static function updateUserRole($role,$id){


    $columns = "role='$role'";
    $result = Database::update(self::$table,$columns,$id);
    // var_dump($result);
    return $result; 

}


}


