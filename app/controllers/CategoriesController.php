<?php


namespace App\Controllers;
 require_once __DIR__ . '/../../vendor/autoload.php';
 use App\Models\Categories;


class CategoriesController{


    

public static function show(){

        $category = Categories::showCategory();
        return $category;
}

public static function totalCategories(){

    $countCategory = Categories::countCategory();
    return $countCategory;

}


public static function create(){

    if (isset($_POST['addCategory']) && $_SERVER["REQUEST_METHOD"] == "POST"){
           $categoryName = $_POST['category_name'];
           $result=Categories::addcategorys($categoryName);
    }        
}


public static function update(){

    if(isset($_POST['UpadateCategory']) && $_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_GET['caty_id'];
        $CategoryName=$_POST['categorie_name'];
        $result = Categories::update($CategoryName,$id);
        if($result){
            die("hell ya");
        }
    }
    
}

public static function destroy(){

    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
        $id = $_GET["id"];
        Categories::deletCategory($id);
        header("Location: Category.php");
        exit;
    }
    
}

public static function getCategoryById(){
        $id=$_GET['caty_id'];
        $Categorybyid=Categories::findCategoryById($id);
        return $Categorybyid;
}

    




}