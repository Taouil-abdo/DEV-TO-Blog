<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class Articles{


    private static $table = "articles";


    public static function showArticle(){

        $conn = Database::getInstanse()->getConnection();

        $query = "SELECT articles.*,users.username,categories.categorie_name FROM articles JOIN categories on articles.category_id = categories.id JOIN users ON articles.author_id=users.id"  ;
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $Article = $stmt->fetchAll();
        return $Article;
        if($Article){
            header("Location:Article.php");
            echo "the Article deleted with success";
        }
        
    }

    public static function addArticle($title,$slug,$content,$excerpt,$meta_description,$featured_image,$scheduled_date,$category_id,$author_id,$tags){

        $col = "title,slug,content,excerpt,meta_description,featured_image,scheduled_date,category_id,author_id";
        $val = [$title,$slug,$content,$excerpt,$meta_description,$featured_image,$scheduled_date,$category_id,$author_id];
        // $tags= [$tag_id];
        // var_dump($tags);
        $addArticle = Database::addArticle(self::$table,$col,$val,$tags);

        return $addArticle;
        if($addArticle){
            header("Location:Article.php");
            echo "the Article added with success";
        }


    }

    public static function deleteArticle($id){

        $result = Database::DeleteItem(self::$table,$id);
        var_dump($result);
        
        if($result){
            return $result;
        }else{
            die("somthing wrong");
        }
    }

    public static function getPublishedArticle(){

        $conn = Database::getInstanse()->getConnection();

        $query = "SELECT articles.*,users.username,categories.categorie_name FROM articles JOIN categories on articles.category_id = categories.id JOIN users ON articles.author_id=users.id where status ='published' order by id desc LIMIT 5";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $Article = $stmt->fetchAll();

        return $Article;

    }

    public static function getArticleByID($id){

        $result = Database::findById(self::$table,$id);
        return $result;

    }

    public static function getArticleBystatus(){

        $conn = Database::getInstanse()->getConnection();

        $query ="SELECT * FROM articles where status = 'published'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;

    }

    public static function UpdateArticleAuthore($id, $title, $slug, $content, $excerpt, $meta_description, $featured_image, $scheduled_date, $category_id, $author_id, $tag_id) {
        $conn = Database::getInstanse()->getConnection();
    
        $query = "UPDATE articles
                  SET title = :title, slug = :slug, content = :content, excerpt = :excerpt, meta_description = :meta_description, featured_image = :featured_image, scheduled_date = :scheduled_date, category_id = :category_id, author_id = :author_id
                  WHERE id = :id AND author_id = :author_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':slug', $slug);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':excerpt', $excerpt);
        $stmt->bindParam(':meta_description', $meta_description);
        $stmt->bindParam(':featured_image', $featured_image);
        $stmt->bindParam(':scheduled_date', $scheduled_date);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':author_id', $author_id);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
    
        // Debugging output
        echo "Update Query: $query<br>";
        echo "Result: " . ($result ? "Success" : "Failure") . "<br>";
    
        $deleteTagsQuery = "DELETE FROM article_tags WHERE article_id = :id";
        $deleteTagsStatement = $conn->prepare($deleteTagsQuery);
        $deleteTagsStatement->bindParam(':id', $id);
        $tt = $deleteTagsStatement->execute();
    
        // Debugging output
        echo "Delete Tags Query: $deleteTagsQuery<br>";
        echo "Delete Tags Result: " . ($tt ? "Success" : "Failure") . "<br>";
    
        foreach ($tag_id as $tagId) {
            $ArticletagQuery = "INSERT INTO article_tags (article_id, tag_id) VALUES (:id, :tagId)";
            $ArticletagStatement = $conn->prepare($ArticletagQuery);
            $ArticletagStatement->bindParam(':id', $id);
            $ArticletagStatement->bindParam(':tagId', $tagId);
            $rrr = $ArticletagStatement->execute();
    
            // Debugging output
            echo "Insert Tag Query: $ArticletagQuery<br>";
            echo "Insert Tag Result: " . ($rrr ? "Success" : "Failure") . "<br>";
        }
        return true;
    }

    public static function getArticlesByAuthor($id){

        $conn = Database::getInstanse()->getConnection();
        $query = "SELECT articles.*,categories.categorie_name FROM articles JOIN categories on articles.category_id = categories.id WHERE author_id = $id";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;

    }
   
    public static function updateArticleStatus($status, $id){
    $columns = "status='$status'";
    $result = Database::update(self::$table,$columns,$id);
    return $result; 

    }
    

//    public static function lookedForArticle($Search){
//     $table=self::$table;
//     // "SELECT * FROM articles JOIN categories ON articles.category_id = categories.id JOIN article_tags on
//     //  article_tags.article_id=articles.id JOIN tags on  tags.id = article_tags.tag_id "
//     $conn = Database::getInstanse()->getConnection();
//     $query = "SELECT * FROM articles WHERE title LIKE '%$Search%' OR content LIKE '%$Search%'";
//     $stmt = $conn->prepare($query);
//     $stmt->execute();
//     $q = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     return $q;
//    }
// ------------------- search ---------------------------
   public static function lookedForArticle($Search) {

    $conn = Database::getInstanse()->getConnection();

    $query = "SELECT * FROM articles WHERE title LIKE :search OR content LIKE :search";
    $stmt = $conn->prepare($query);
    $searchParam = '%' . $Search . '%';
    $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;

}







}
