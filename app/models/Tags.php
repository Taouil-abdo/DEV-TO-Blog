<?php

namespace App\Models;

use App\Config\Database;


class Tags{


    private static $table = "tags";
    private static $column = "tag_name";


    public static function showTags(){

        $tags = Database::getData(self::$table);
        return $tags;
    }



    public static function addTags($values){

        $tags=Database::Add(self::$table,self::$column,$values);
        // return $tags;
        if($tags){
            header("Location:tag.php");
        }

    }



    public static function deletTag($id){

        $ff = Database::DeleteItem(self::$table,$id);
        return $ff;
    } 

    public static function findTagById($id){

        $getTagId=Database::findById(self::$table,$id);
        return $getTagId;
    }

    public static function update($tagName,$id){

        $columns = "tag_name = '$tagName'";
        $rr = Database::update(self::$table,$columns,$id);
        return $rr;
    }

    public static function countTags(){

        $countTags=Database::countItems(self::$table);
        return $countTags;

    }








}