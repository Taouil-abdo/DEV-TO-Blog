<?php

namespace App\Models;

use App\Config\Database;


class Articles{


    private static $table = "articles";

    // public function save($wiki)
    // {
    //     $currentTimestamp = date('Y-m-d H:i:s');
    //     try {
    //         $title = $wiki->getTitle();
    //         $content = $wiki->getContent();
    //         $image = $wiki->getImage();
    //         $date = $currentTimestamp;
    //         $status = 0;
    //         $authorId = $_SESSION["userId"];
    //         $categoryId = $wiki->getCategoryId();

    //         if (!empty($title) && !empty($content) && !empty($date) && !empty($authorId) && !empty($categoryId)) {

    //             $query = "INSERT INTO `$table`(`title`, `content`, `image`, `status`, `created_at`, `author_id`, `category_id`) VALUES (?,?,?,?,?,?,?)";
    //             $statement = $this->database->prepare($query);
    //             $statement->execute([$title, $content, $image, $status, $date, $authorId, $categoryId]);


    //             $wikiId = $this->database->lastInsertId();

    //             $selectedTagIds = $_POST['tags'] ?? [];

    //             if (!empty($wikiId) && !empty($selectedTagIds)) {
    //                 foreach ($selectedTagIds as $tagId) {
    //                     $wikitagQuery = "INSERT INTO `wikitag`(`wiki_id`, `tag_id`) VALUES (?, ?)";
    //                     $wikitagStatement = $this->database->prepare($wikitagQuery);
    //                     $wikitagStatement->execute([$wikiId, $tagId]);
    //                 }
    //             } else {
    //                 throw new Exception("No tags selected or wiki ID missing.");
    //             }
    //         } else {
    //             throw new Exception("Required fields are empty.");
    //         }
    //     } catch (PDOException $e) {
    //         error_log("Something went wrong in the database: " . $e->getMessage());
    //     } catch (Exception $e) {
    //         error_log("Error: " . $e->getMessage());
    //     }
    // }


    public static function showArticle(){

        $join = 'JOIN categories c ON articles.category_id = c.id JOIN users u ON articles.author_id = u.id';

        $Article = Database::getData(self::$table,$join);
        return $Article;
    }




}
?>