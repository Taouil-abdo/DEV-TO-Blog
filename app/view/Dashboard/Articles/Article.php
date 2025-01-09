<?php 

require_once __DIR__."/../../../../vendor/autoload.php";

use App\Controllers\CategoriesController;
use App\Controllers\ArticlesController;
use App\Controllers\TagsController;
use App\Controllers\UsersController;

UsersController::logoutview();
$Categories = CategoriesController::show();
$rows = ArticlesController::show();
ArticlesController::addArticle();
ArticlesController::delete();
$Tags = TagsController::show();
$result=ArticlesController::updateArticleStatus();
$artByAuths=ArticlesController::getAuthorsArticles();



 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/f01941449c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <title>dashboard</title>
</head>

<body>

    <div class="flex h-screen bg-gray-100">

        <!-- sidebar -->
        <div class="hidden md:flex flex-col w-64 bg-gray-800">
            <div class="flex items-center justify-center h-16 bg-gray-900">
                <a href="/../../../"><span class="text-white font-bold uppercase">DivoBlog</span></a>
            </div>
            <div class="flex flex-col flex-1 overflow-y-auto">
                <?php if($_SESSION['role'] === 'admin' ) {?>

                <nav class="flex-1 px-4 py-4">
                    <a href="../dashboard.php"
                        class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                    <a href="../Users/User.php"
                        class="flex items-center px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-users mr-2"></i> Users
                    </a>
                    <a href="../Categories/Category.php"
                        class="flex items-center px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-folder-open mr-2"></i> Categories
                    </a>
                    <a href="../Tags/Tag.php"
                        class="flex items-center px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-tags mr-2"></i> Tags
                    </a>

                    <a href="#" class="flex items-center px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-file-alt mr-2"></i> Articles
                    </a>

                    <?php } elseif($_SESSION['role'] === 'author'){?>

                    <a href="" class="flex items-center px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-file-alt mr-2"></i> Articles
                    </a>
                    <a href="../../Profile/profile.php"
                        class="flex items-center px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-file-alt mr-2"></i> Profile
                    </a>

                    <?php } ?>
                    <form method='POST'
                        class="flex items-center gap-3 px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <button type="submit" name="logout">Logout</button>
                    </form>
                </nav>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex flex-col flex-1 overflow-y-auto">
            

<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
      </button>
      <!-- Dropdown menu -->
      <div class="z-50 hidden my-10 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
        <div class="px-4 py-3 flex flex-col gap-6">
          <span class="block text-sm text-gray-900 dark:text-white"><?= $_SESSION['username']?></span>
          <span class="block text-sm text-gray-500 truncate dark:text-gray-400 hover:bg-orange-200 hover:text-gray-900  p-5"><a href="../../Profile/Profile.php">Profile</a></span>

        </div>
      </div>
      <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
  </div>
  </div>
</nav>

                <div class="flex justify-evenly items-center ">
                <div class="p-4">
                    <h1 class="text-2xl font-bold">Welcome to Your dashboard Mr <?= $_SESSION['username']?> </h1>
                    <p class="mt-2 text-gray-600">This is an example dashboard using Tailwind CSS.</p>
                </div>
                <?php if($_SESSION['role'] === 'author'){ ?>

                <!-- button Ajouter player -->
                <div class="btnAjouter">
                    <button id="btnAjouter" class="h-10 w-24 bg-blue-600 text-white rounded shadow-lg">Add
                        Article</button>
                </div>
            <?php } ?>
            </div>

            
            
            <!-- ------------------- FORM ---------------------------------- -->

            <div id="content" role="main" class="w-full  max-w-md p-6">
                <?php if($_SESSION['role'] == 'author'){?>
                <div id="form-parent"
                    class="mt-7 bg-white hidden rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700 border-2 border-indigo-300">
                    <div class="p-4 sm:p-7">
                        <div class="text-center">
                            <h1 class="text-2xl font-bold text-gray-800 mb-6">Create Article</h1>
                        </div>

                        <form method="POST" enctype="multipart/form-data">
                            <!-- Title -->
                            <div class="mb-4">
                                <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                                <input type="text" id="title" name="title" placeholder="Enter article title"
                                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            </div>

                            <!-- Slug -->
                            <div class="mb-4">
                                <label for="slug" class="block text-gray-700 font-medium mb-2">Slug</label>
                                <input type="text" id="slug" name="slug" placeholder="Enter article slug"
                                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            </div>

                            <!-- Content -->
                            <div class="mb-4">
                                <label for="content" class="block text-gray-700 font-medium mb-2">Content</label>
                                <textarea id="content" name="content" rows="6" placeholder="Enter article content"
                                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
                            </div>

                            <!-- Excerpt -->
                            <div class="mb-4">
                                <label for="excerpt" class="block text-gray-700 font-medium mb-2">Excerpt</label>
                                <textarea id="excerpt" name="excerpt" rows="3" placeholder="Enter article excerpt"
                                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
                            </div>

                            <!-- Meta Description -->
                            <div class="mb-4">
                                <label for="meta_description" class="block text-gray-700 font-medium mb-2">Meta
                                    Description</label>
                                <input type="text" id="meta_description" name="meta_description"
                                    placeholder="Enter meta description"
                                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            </div>

                            <!-- Featured Image -->
                            <div class="mb-4">
                                <label for="featured_image" class="block text-gray-700 font-medium mb-2">Featured
                                    Image</label>
                                <input type="file" id="Article_image" name="Article_image" accept="image/*"
                                    placeholder="Enter image URL"
                                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            </div>
                            <!-- Status -->
                            <!-- Scheduled Date -->
                            <div class="mb-4">
                                <label for="scheduled_date" class="block text-gray-700 font-medium mb-2">Scheduled
                                    Date</label>
                                <input type="datetime-local" id="scheduled_date" name="scheduled_date"
                                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            </div>

                            <!-- Category ID -->
                            <div class="mb-4">
                                <label for="category_id" class="block text-gray-700 font-medium mb-2">Category</label>
                                <select name="category_id" id="category_id"
                                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                                    <?php foreach ($Categories as $Categorie): ?>
                                    <option value="<?= $Categorie['id'] ?>"><?= $Categorie['categorie_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <!-- Tag ID -->
                            <div class="mb-4">
                                <label for="tag_id" class="block text-gray-700 font-medium mb-2">Category</label>
                                <select name="tag_id[]" multiple="multiple" id="tag_id"
                                    class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                                    <?php foreach ($Tags as $Tag): ?>
                                    <option value="<?= $Tag['id'] ?>"><?= $Tag['tag_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <!-- Submit Button -->
                            <div class="mt-6">
                                <button type="submit" name="AddArticle"
                                    class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">Add
                                    Article</button>
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
                                    <th class="py-2 px-4">featured_image</th>
                                    <th class="py-2 px-4">status</th>
                                    <th class="py-2 px-4">categorie_name</th>
                                    <th class="py-2 px-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            if ($artByAuths) {
                              foreach($artByAuths as $artByAuth){ ?>
                                <tr class="border-b">
                                    <td class="py-2 px-4"><?= $artByAuth['title']; ?></td>
                                    <td class="py-2 px-4"><img
                                            src="../../../asset/uploads/Articles/<?php echo $artByAuth['featured_image']?>"
                                            width="40px" alt="Player Image"></td>

                                    <?php if($artByAuth['status'] == 'draft') { ?>
                                    <td class="py-2 px-4 ">
                                        <div
                                            class="bg-orange-500 text-white h-10 w-[4rem] flex justify-center items-center rounded-lg">
                                            <?= $artByAuth['status']; ?></div>
                                    </td>
                                    <?php } ?>
                                    <?php if($artByAuth['status'] == 'published'){ ?>
                                    <td class="py-2 px-4 ">
                                        <div
                                            class="bg-green-500 text-white h-10 w-[5rem] flex justify-center items-center rounded-lg ">
                                            <?= $artByAuth['status']; ?></div>
                                    </td>
                                    <?php } ?>
                                    <?php if($artByAuth['status'] == 'scheduled'){ ?>
                                    <td class="py-2 px-4">
                                        <div
                                            class="bg-yellow-500 text-white h-10 w-[5rem] flex justify-center items-center rounded-lg">
                                            <?= $artByAuth['status']; ?></div>
                                    </td>
                                    <?php } ?>

                                    <td class="py-2 px-4"><?= $artByAuth['categorie_name']; ?></td>

                                    <td class="py-2 px-4">
                                        <a href="update.php?id=<?= $artByAuth['id']; ?>"
                                            class="text-blue-500 hover:underline"><i class="fa-solid fa-pencil"></i></a>
                                        |
                                        <a href="Article.php?Article_id=<?= $artByAuth['id']; ?>"
                                            onclick="return confirm('Are you sure you want to delete this Article ?')"
                                            class="text-red-500 hover:underline"><i class="fa-solid fa-trash"></i></a>
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

                <?php } else {?>


                <div class="flex-col max-w-7xl px-4 sm:px-6">
                    <!-- tablue -->
                    <div class="container mx-auto p-4">
                        <!-- <div class="overflow-x-auto"> -->
                        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="py-2 px-4">title</th>
                                    <th class="py-2 px-4">featured_image</th>
                                    <th class="py-2 px-4">status</th>
                                    <th class="py-2 px-4">categorie_name</th>
                                    <th class="py-2 px-4">Author</th>
                                    <th class="py-2 px-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($rows) {
                              
                              foreach($rows as $row){?>
                                <form method='POST'>
                                    <tr class="border-b">
                                        <td class="py-2 px-4"><?= $row['title']; ?></td>
                                        <!-- <td class="py-2 px-4"><?= $row['featured_image']; ?></td> -->
                                        <td class="py-2 px-4"><img
                                                src="../../../asset/uploads/Articles/<?php echo $row['featured_image']?>"
                                                width="40px" alt="Player Image"></td>

                                        <td>
                                            <select name="status" id="status">
                                                <option value="<?php echo $row['status']?>"><?php echo $row['status']?>
                                                </option>
                                                <option value="published">Published</option>
                                                <option value="scheduled">Scheduled</option>
                                                <option value="draft">Draft</option>
                                            </select>
                                        </td>

                                        <td class="py-2 px-4"><?= $row['categorie_name']; ?></td>
                                        <td class="py-2 px-4"><?= $row['username']; ?></td>


                                        <td class="py-2 px-4">
                                            <input type="hidden" name="ArticleID" value="<?= $row['id']; ?>">
                                            <button type="submit" name="updateArticle"
                                                class="text-blue-500 hover:underline">
                                                <i class="fa-solid fa-pencil"></i>
                                            </button> |
                                            <!-- <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this player?')"
                                        class="text-red-500 hover:underline">>
                                        <i class="fa-solid fa-trash"></i>
                                    </button> -->
                                        </td>
                                    </tr>
                                </form>
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
                <?php }?>

            </div>

        </div>

        <script>
        let btnAjouter = document.getElementById("btnAjouter");
        let formParent = document.getElementById("form-parent");

        btnAjouter.addEventListener("click", function() {
            formParent.classList.toggle("hidden");
        })
        </script>

        <!-- </script> -->
</body>

</html>