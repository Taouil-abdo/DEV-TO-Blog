<?php
namespace App\Controllers;
require_once __DIR__ . '/../../vendor/autoload.php';
 
use App\Models\Tags;

class TagsController{

    public function index(){
        $tags = Tags::all();
    }


    public function create(){
        
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

    




}