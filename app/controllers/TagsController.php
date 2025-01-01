<?php
namespace App\Controllers;
require_once __DIR__ . '/../../vendor/autoload.php';
 
use App\Models\Tags;

class TagsController{

    public function index(){
        $tags = Tags::all();
    }


    public static function create(){

        if (isset($_POST['addTag']) && $_SERVER["REQUEST_METHOD"] == "POST"){
               $tagName = $_POST['tag_name'];
               $result=Tags::addTags($tagName);
        }

       return $result;
        
    }

    public function store(){
        
    }

    public static function show(){
        $tags = Tags::showTags();
        return $tags;
    }

    public function edit($id){
        $tag = Tags::find($id);
    }

    public function update($id){
        
    }

    public function destroy($id){
        
    }

    public static function totalTags(){

        $countTags = Tags::countTags();
        return $countTags;

    }

    




}


