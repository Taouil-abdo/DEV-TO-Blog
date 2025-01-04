<?php

namespace App\Config;
require_once __DIR__ . '/../../vendor/autoload.php';

use Dotenv;
use PDO;
use PDOException;

class Database {


    private static $ServerName;
    private static $UserName;
    private static $PassWord;
    private static $DbName;
    private static $conn;
    private static $instance = null;

    private static $table;


    public function __construct() {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();
        
        self::$ServerName = $_ENV['DB_HOST'];
        self::$UserName = $_ENV['DB_USER'];
        self::$PassWord = $_ENV['DB_PASS'];
        self::$DbName = $_ENV['DB_NAME'];

        
            try {
                self::$conn = new PDO("mysql:host=" . self::$ServerName . ";dbname=" . self::$DbName, self::$UserName, self::$PassWord);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }

        return self::$conn;
        
    }

    public static function getInstanse(){

        if(self::$instance == null){
            self::$instance = new self();
        }
        return self::$instance; 
               
    }

    public static function getConnection() {
        return self::$conn;
    }

// _______________ ORMMethodes __________________



// ---------------------- getData -----------------

    public static function getData($table,$xx = ''){

    $conn = self::getInstanse()->getConnection();

    $query = "SELECT * FROM $table $xx";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll();
    return $users;
    }

// ---------------------- countItems -----------------

    public static function countItems($table){

        $conn = self::getInstanse()->getConnection();

        $query = "SELECT COUNT(*) FROM $table";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $users = $stmt->fetch();
        return $users[0];
    }

// ---------------------- Add -----------------

    public static function Add($table,$colm,$val){

        $conn = self::getInstanse()->getConnection();
         
        $query = "INSERT INTO $table ($colm) VALUES (:value)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':value',$val);
        return $stmt->execute();
    }

// ---------------------- DeleteItem -----------------

    public static function DeleteItem($table,$id){

        $conn = self::getInstanse()->getConnection();

        $query = "DELETE FROM $table where id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id',$id);

       return $stmt->execute();

    }

    // ---------------------- findById -----------------

    public static function findById($table,$id){

        $conn = self::getInstanse()->getConnection();

        $query = "SELECT * FROM $table WHERE id = :id";
        $stmt=$conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ---------------------- update -----------------

    public static function update($table,$columns,$id){
        
        $conn = self::getInstanse()->getConnection();

        $query="UPDATE $table SET $columns where id=:id";
        $stmt=$conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();

        }

        
    
      
}

// $bn=Database::Add('tags','tag_name','"lol"');

// var_dump($bn);



