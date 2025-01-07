<?php

namespace App\Controllers;
require_once __DIR__ . '/../../vendor/autoload.php';
use App\Models\Articles;
 
class ArticlesController{


public static function show(){

    $res = Articles::showArticle();
    return $res;
}


public static function addArticle(){
        session_start();
    if(isset($_POST['AddArticle']) && $_SERVER['REQUEST_METHOD'] === 'POST'){

    
        $title=$_POST['title'] ;
        $slug =$_POST['slug'] ;
        $content =$_POST['content'] ;
        $excerpt =$_POST['excerpt'] ;
        $meta_description =$_POST['meta_description'] ;
        // $status =$_POST['status'] ;
        $scheduled_date =$_POST['scheduled_date'] ;
        $category_id =$_POST['category_id'] ;
        $tag_id =$_POST['tag_id'] ;
        $author_id =$_SESSION["id"] ;

        $featured_image = $_FILES['featured_image']['name'];
        $temp_file = $_FILES['featured_image']['tmp_name'];
        $folder = __DIR__."/../asset/uploads/Articles/$featured_image";
        move_uploaded_file($temp_file, $folder);

        // var_dump($tag_id);
        // echo $title.",".$slug.",".$content.",".$excerpt.",".$meta_description.",".$featured_image.",".$status.",".$scheduled_date.",".$category_id.",".$tag_id.",".$author_id;
        $ss = Articles::addArticle($title,$slug,$content,$excerpt,$meta_description,$featured_image,$scheduled_date,$category_id,$author_id,$tag_id);

    
    }

}

public static function updateArticleForAuthore(){

    session_start();
    if(isset($_POST['updateArticle']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
        if (isset($_GET['Article_id']) && isset($_SESSION['id'])) {

        $id=$_GET['Article_id'];
        $title=$_POST['title'] ;
        $slug =$_POST['slug'] ;
        $content =$_POST['content'] ;
        $excerpt =$_POST['excerpt'] ;
        $meta_description =$_POST['meta_description'] ;
        $schuled_date =$_POST['scheduled_date'] ;
        $category_id =$_POST['category_id'] ;
        $scheduled_date = date('Y-m-d H:i:s', strtotime($schuled_date)); 
        $tag_id =$_POST['tag_id'] ?? [];
        // var_dump($tag_id);

        $author_id =$_SESSION["id"] ;

        $featured_image = $_FILES['Article_image']['name'];
        $temp_file = $_FILES['Article_image']['tmp_name'];
        $folder = __DIR__."/../asset/uploads/Articles/$featured_image";
        move_uploaded_file($temp_file, $folder);


        $ss = Articles::UpdateArticleAuthore($id,$title,$slug,$content,$excerpt,$meta_description,$featured_image,$scheduled_date,$category_id,$author_id,$tag_id);
         return $ss;
        //  var_dump($ss);
        }

    }

}



    


















}