<?php 
require_once __DIR__."/../../../controllers/ArticlesController.php";
require_once __DIR__."/../../../controllers/CategoriesController.php";
require_once __DIR__."/../../../controllers/TagsController.php";

use App\Controllers\CategoriesController;
use App\Controllers\ArticlesController;
use App\Controllers\TagsController;


$Categories = CategoriesController::show();
$rows = ArticlesController::show();
$Tags = TagsController::show();


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/f01941449c.js" crossorigin="anonymous"></script>
    <title>dashboard</title>
</head>
<body>
    
<div class="flex h-screen bg-gray-100">

    <!-- sidebar -->
    <div class="hidden md:flex flex-col w-64 bg-gray-800">
        <div class="flex items-center justify-center h-16 bg-gray-900">
            <span class="text-white font-bold uppercase">DivoBlog</span>
        </div>
        <div class="flex flex-col flex-1 overflow-y-auto">
        <nav class="flex-1 px-4 py-4">
            <a href="../dashboard.php" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 rounded-md">
                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
            </a>
            <a href="../Users/User.php" class="flex items-center px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
                <i class="fas fa-users mr-2"></i> Users
            </a>
            <a href="#" class="flex items-center px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
                <i class="fas fa-file-alt mr-2"></i> Articles
            </a>
            <a href="../Categories/Category.php" class="flex items-center px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
                <i class="fas fa-folder-open mr-2"></i> Categories
            </a>
            <a href="../Tags/Tag.php" class="flex items-center px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
                <i class="fas fa-tags mr-2"></i> Tags
            </a>
        </nav>
        </div>
    </div>

    <!-- Main content -->
    <div class="flex flex-col flex-1 overflow-y-auto">
        <div class="flex items-center justify-between h-16 bg-white border-b border-gray-200">
            <div class="flex items-center px-4">
                <button class="text-gray-500 focus:outline-none focus:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <input class="mx-4 w-full border rounded-md px-4 py-2" type="text" placeholder="Search">
            </div>
            <div class="flex items-center pr-4">

                <button
                    class="flex items-center text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19l-7-7 7-7m5 14l7-7-7-7" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="flex justify-evenly items-center "> 
          <div class="p-4">
            <h1 class="text-2xl font-bold">Welcome to my dashboard!</h1>
            <p class="mt-2 text-gray-600">This is an example dashboard using Tailwind CSS.</p>
          </div>

          <!-- button Ajouter player -->
          <div class="btnAjouter">
               <button id="btnAjouter" class="h-10 w-24 bg-blue-600 text-white rounded shadow-lg">Add Article</button>
          </div>

        </div>

        <!-- ------------------- FORM ---------------------------------- -->

        <div id="content" role="main" class="w-full  max-w-md p-6">
            <div class="mt-7 bg-white  rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700 border-2 border-indigo-300">
                <div class="p-4 sm:p-7">
                  <div class="text-center">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">Create / Edit Article</h1>
                  </div>

                 <form>
                  <!-- Title -->
                  <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                    <input type="text" id="title" name="title" placeholder="Enter article title" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                  </div>

                   <!-- Slug -->
                  <div class="mb-4">
                      <label for="slug" class="block text-gray-700 font-medium mb-2">Slug</label>
                       <input type="text" id="slug" name="slug" placeholder="Enter article slug" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                  </div>

                    <!-- Content -->
                  <div class="mb-4">
                       <label for="content" class="block text-gray-700 font-medium mb-2">Content</label>
                       <textarea id="content" name="content" rows="6" placeholder="Enter article content" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
                  </div>

                    <!-- Excerpt -->
                  <div class="mb-4">
                    <label for="excerpt" class="block text-gray-700 font-medium mb-2">Excerpt</label>
                    <textarea id="excerpt" name="excerpt" rows="3" placeholder="Enter article excerpt" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
                  </div>

                      <!-- Meta Description -->
                  <div class="mb-4">
                       <label for="meta_description" class="block text-gray-700 font-medium mb-2">Meta Description</label>
                       <input type="text" id="meta_description" name="meta_description" placeholder="Enter meta description" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                  </div>

                       <!-- Featured Image -->
                  <div class="mb-4">
                      <label for="featured_image" class="block text-gray-700 font-medium mb-2">Featured Image</label>
                      <input type="file" id="featured_image" name="featured_image" placeholder="Enter image URL" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                  </div>

                        <!-- Status -->
                  <div class="mb-4">
                     <label for="status" class="block text-gray-700 font-medium mb-2">Status</label>
                      <select id="status" name="status" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                        <option value="scheduled">Scheduled</option>
                      </select>
                  </div>

                       <!-- Scheduled Date -->
                  <div class="mb-4">
                        <label for="scheduled_date" class="block text-gray-700 font-medium mb-2">Scheduled Date</label>
                        <input type="datetime-local" id="scheduled_date" name="scheduled_date" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                  </div>

                       <!-- Category ID -->
                  <div class="mb-4">
                        <label for="category_id" class="block text-gray-700 font-medium mb-2" >Category</label>
                        <select name="category_id" id="category_id" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            <?php foreach ($Categories as $Categorie): ?>
                                <option value="<?= $Categorie['id'] ?>"><?= $Categorie['categorie_name'] ?></option>
                              <?php endforeach ?>
                        </select>
                  </div>
                       <!-- Tag ID -->
                  <div class="mb-4">
                        <label for="category_id" class="block text-gray-700 font-medium mb-2">Category</label>
                        <select name="category_id" id="category_id" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            <?php foreach ($Tags as $Tag): ?>
                                <option value="<?= $Tag['id'] ?>"><?= $Tag['tag_name'] ?></option>
                              <?php endforeach ?>
                        </select>
                  </div>

                       <!-- Author ID -->
                  <div class="mb-4">
                        <label for="author_id" class="block text-gray-700 font-medium mb-2">Author</label>
                        <input type="number" id="author_id" name="author_id" placeholder="Enter author ID" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                  </div>

                        <!-- Submit Button -->
                  <div class="mt-6">
                       <button type="submit" name="addArticle" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">Add Article</button>
                  </div>
              </form>
           </div>
        </div>

        <!-- ------------------- END FROM ------------------------------ -->
        
        <div class="flex-col max-w-7xl px-4 sm:px-6">
            
        <!-- tablue -->
            <div class="container mx-auto p-4">
         <!-- <div class="overflow-x-auto"> -->
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-2 px-4">title</th>
                        <th class="py-2 px-4">content</th>
                        <th class="py-2 px-4">featured_image</th>
                        <th class="py-2 px-4">status</th>
                        <th class="py-2 px-4">categorie_name</th>
                        <th class="py-2 px-4">Author</th>
                        <th class="py-2 px-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    if ($rows) {
                      foreach($rows as $row){
                  ?>
                    <tr class="border-b">
                        <td class="py-2 px-4"><?= $row['title']; ?></td>
                        <td class="py-2 px-4"><?= $row['content']; ?></td>
                        <td class="py-2 px-4"><?= $row['featured_image']; ?></td>
                        <?php if($row['status'] == 'draft') { ?>
                          <td class="py-2 px-4 "><div class="bg-orange-500 text-white h-10 w-[4rem] flex justify-center items-center rounded-lg"><?= $row['status']; ?></div></td>
                        <?php } ?>                       
                        <?php if($row['status'] == 'published'){ ?>
                          <td class="py-2 px-4 "><div class="bg-green-500 text-white h-10 w-[5rem] flex justify-center items-center rounded-lg "><?= $row['status']; ?></div></td>
                        <?php } ?>  
                        <?php if($row['status'] == 'scheduled'){ ?>
                          <td class="py-2 px-4 "><div class="bg-yellow-500 text-white h-10 w-[5rem] flex justify-center items-center rounded-lg"><?= $row['status']; ?></div></td>
                        <?php } ?>  
                                            
                        <td class="py-2 px-4"><?= $row['categorie_name']; ?></td>
                        <td class="py-2 px-4"><?= $row['username']; ?></td>

                        <td class="py-2 px-4">
                            <a href="users/updateUser.php?User_id=<?= $row['id']; ?>" class="text-blue-500 hover:underline"><i class="fa-solid fa-pencil"></i></a> |
                            <a href="dashboard.php?id=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this player?')" class="text-red-500 hover:underline"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                      }
                      } else {
                      echo "<tr><td colspan='8' class='py-2 px-4 text-center'>No data available</td></tr>";
                      }
                    ?>
            </tbody>
            </table>
            </div>
       </div>
    </div>        
    
</div>

</script>
</body>
</html>