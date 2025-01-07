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







}


