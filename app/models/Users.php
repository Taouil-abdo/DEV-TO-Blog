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
}


public static function loginUser($email, $password){
    session_start();

    $row = Database::findByEmail($email);
    if($row){

        $_SESSION["role"] = $row['role'];
        $_SESSION["id"] = $row['id'];
        $_SESSION["username"] = $row['username'];

    
        if(password_verify($password,$row['password_hash'])){

                if($_SESSION['role'] == 'admin'){
                    header("Location: ../../view/Dashboard/dashboard.php");
                    exit;
                }elseif($_SESSION['role'] == 'user'){
                    header('Location: ../../../../index.php');
                    exit;
                }elseif($_SESSION['role'] == 'author'){
                    header("Location: ../../view/Dashboard/dashboard.php");
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




}


