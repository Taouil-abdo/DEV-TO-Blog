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



    public static function getData($table){

    $conn = Database::getInstanse()->getConnection();

    $query = "SELECT * FROM $table";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $users = $stmt->fetchAll();
    return $users;
    }


    public static function countItems($table){

        $conn = Database::getInstanse()->getConnection();

        $query = "SELECT COUNT(*) FROM $table";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $users = $stmt->fetch();
        return $users[0];
    }


      
}

// $bn=Database::getInstanse();
// $conn = $bn->get();

// var_dump($conn);

