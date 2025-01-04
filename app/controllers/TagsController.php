<?php
namespace App\Controllers;
require_once __DIR__ . '/../../vendor/autoload.php';
 
use App\Models\Tags;

class TagsController{

    

    public static function create(){

        if (isset($_POST['addTag']) && $_SERVER["REQUEST_METHOD"] == "POST"){
               $tagName = $_POST['tag_name'];
               $result=Tags::addTags($tagName);
        }        
    }

    public static function show(){
        $tags = Tags::showTags();
        return $tags;
    }

    public static function update(){

        if(isset($_POST['updateTag']) && $_SERVER['REQUEST_METHOD'] == "POST"){
            $id = $_GET['id'];
            $tagName=$_POST['tag_name'];
            var_dump($id,$tagName);
            $result = Tags::update($tagName,$id);
            if($result){
                die("hell ya");
            }
        }
        
    }

    public static function destroy(){

        if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
            $id = $_GET["id"];
            Tags::deletTag($id);
            header("Location: tag.php");
            exit;
        }
        
    }

    public static function totalTags(){

        $countTags = Tags::countTags();
        return $countTags;

    }

    public static function getTagById(){
            $id=$_GET['id'];
            $tagbyid=Tags::findTagById($id);
            return $tagbyid;
    }

    




}


