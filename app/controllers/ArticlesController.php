<?php


namespace App\Controllers;
 require_once __DIR__ . '/../../vendor/autoload.php';
 use App\Models\Articles;
 
class ArticlesController{


public static function show(){

    $res = Articles::showArticle();
    return $res;
}







    
}