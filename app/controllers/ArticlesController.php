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
        $scheduled_date =$_POST['scheduled_date'] ;
        $category_id =$_POST['category_id'] ;
        $tag_id =$_POST['tag_id'] ;
        $author_id =$_SESSION["id"] ;

        $featured_image = $_FILES['Article_image']['name'];
        $temp_file = $_FILES['Article_image']['tmp_name'];
        $folder = __DIR__."/../asset/uploads/Articles/$featured_image";
        move_uploaded_file($temp_file, $folder);
        $ss = Articles::addArticle($title,$slug,$content,$excerpt,$meta_description,$featured_image,$scheduled_date,$category_id,$author_id,$tag_id);

    
    }

}


public static function delete(){

    if(isset($_GET['Article_id']) && !empty($_GET['Article_id'])){
        $id=$_GET['Article_id'];
        var_dump($id);
        $result = Articles::deleteArticle($id);
        var_dump($result);
     }
    
}

public static function getPublishedArticle(){

    $result = Articles::getPublishedArticle();
    return $result;

}
    
public static function findArticleById(){

    if(isset($_GET['Article_id'])){
        $id=$_GET['Article_id'];
        $result = Articles::getArticleByID($id);
        return $result;
    }
}

public static function getArticleBystatus(){

        $result= Articles::getArticleBystatus();
        return $result;

}

public static function getArticleById(){

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $result=Articles::getArticleByID($id);
        return $result;
        // var_dump($result);
    }


}

public static function updateArticleForAuthore() {
    session_start();

    if (isset($_POST['updateArticle']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_GET['Article_id']) ) {
            $id = $_GET['Article_id'];
            $title = $_POST['title'];
            $slug = $_POST['slug'];
            $content = $_POST['content'];
            $excerpt = $_POST['excerpt'];
            $meta_description = $_POST['meta_description'];
            $scheduled_date = date('Y-m-d H:i:s', strtotime($_POST['scheduled_date']));
            $category_id = $_POST['category_id'];
            $author_id = $_SESSION["id"];
            $tag_id = $_POST['tag_id'] ?? [];

            // Debugging output
            echo "ID: $id<br>";
            echo "Title: $title<br>";
            echo "Slug: $slug<br>";
            echo "Content: $content<br>";
            echo "Excerpt: $excerpt<br>";
            echo "Excerpt: $featured_image<br>";
            echo "Meta Description: $meta_description<br>";
            echo "Scheduled Date: $scheduled_date<br>";
            echo "Category ID: $category_id<br>";
            echo "Author ID: $author_id<br>";
            echo "Tag IDs: " . implode(', ', $tag_id) . "<br>";

            $featured_image = $_FILES['Article_image']['name'];
            $temp_file = $_FILES['Article_image']['tmp_name'];
            $folder = __DIR__ . "/../asset/uploads/Articles/$featured_image";

            if (move_uploaded_file($temp_file, $folder)) {
                $result = Articles::UpdateArticleAuthore($id, $title, $slug, $content, $excerpt, $meta_description, $featured_image, $scheduled_date, $category_id, $author_id, $tag_id);
                return $result;
                if ($result) {
                    header("Location: Article.php");
                    exit;
                } else {
                    die("Failed to update article.");
                }
            } else {
                die("Failed to upload image.");
            }
        }
    }
}

public static function updateArticleStatus() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateArticle'])) {

            $id = $_POST['ArticleID'] ;
            $status = $_POST['status'] ;
            
            if ($id && $status) {
                $result = Articles::updateArticleStatus($status, $id);
                return $result;
                header("refresh:0");
            } else {
                echo "Error: Missing UserId or status data.";
            }
        }
}

public static function getAuthorsArticles(){

    $id=$_SESSION['id'];
    $result = Articles::getArticlesByAuthor($id);
    return $result;

}

public static function checkRole($requiredRole) {
        // session_start();
        if (!isset($_SESSION["role"]) || $_SESSION["role"] !== $requiredRole) {
            header("Location: ../view/Dashboard/Error404.php");
            exit;
        }
}


public static function SearchArticle(){

    if(isset($_POST['Searchbtn'])){
        $Search = $_POST['Search'];
        $look = Articles::lookedForArticle($Search);
         return $look;
      }

}




}
