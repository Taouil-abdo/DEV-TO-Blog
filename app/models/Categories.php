<?php

namespace App\Models;

use App\Config\Database;


class Categories{


    private static $table = "categories";
    private static $column = "categorie_name";


    public static function showCategory(){

        $category = Database::getData(self::$table);
        return $category;
    }

    public static function addcategorys($values){

        $category=Database::Add(self::$table,self::$column,$values);
        if($category){
            header("Location:category.php");
        }    }

    public static function deletCategory($id){

        $ff = Database::DeleteItem(self::$table,$id);
        return $ff;
    } 

    public static function findCategoryById($id){

        $ff = Database::findById(self::$table,$id);
        return $ff;
    }

    public static function update($name,$id){

        $column = "categorie_name = '$name'";

        $ff = Database::update(self::$table,$column,$id);
        return $ff;

    }

    public static function countcategory(){

        $countcategory=Database::countItems(self::$table);
        return $countcategory;

    }








}