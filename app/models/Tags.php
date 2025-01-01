<?php

namespace App\Models;

use App\Config\Database;


class Tags{


    private static $table = "tags";


    public static function showTags(){

        $tags = Database::getData(self::$table);
        return $tags;
    }

    public function addTags(){


    }

    public function deletTag($id){


    }

    public function getTagById(){


    }

    public function update(){

    }








}