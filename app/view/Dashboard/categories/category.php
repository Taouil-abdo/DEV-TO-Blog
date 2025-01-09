<?php 
require_once __DIR__."/../../../../vendor/autoload.php";

use App\Controllers\CategoriesController;
use App\Controllers\UsersController;

UsersController::logoutview();
$Categories = CategoriesController::show();
CategoriesController::create();
CategoriesController::destroy();
session_start();

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
                    <a href="../Articles/Article.php"
                        class="flex items-center px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-file-alt mr-2"></i> Articles
                    </a>
                    <a href="#"
                        class="flex items-center px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-folder-open mr-2"></i> Categories
                    </a>
                    <a href="../Tags/Tag.php"
                        class="flex items-center px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-tags mr-2"></i> Tags
                    </a>
                    <?php } elseif($_SESSION['role'] === 'author'){?>

                    <a href="../Articles/Article.php"
                        class="flex items-center px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
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
                    <button id="btnAjouter" class="h-10 w-24 bg-blue-600 text-white rounded shadow-lg">Add
                        Category</button>
                </div>

            </div>

            <div class="flex-col max-w-7xl mx-auto px-4 sm:px-6 lg:py-24 lg:px-8">


                <div id="content" role="main" class="w-full  max-w-md mx-auto p-6">
                    <div
                        class="mt-7 bg-white  rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700 border-2 border-indigo-300">
                        <div class="p-4 sm:p-7">
                            <div class="text-center">
                                <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Add New Categor</h1>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                    Categor_Name
                                </p>
                            </div>

                            <div class="mt-5">
                                <form method="POST">
                                    <div class="grid gap-y-4">
                                        <div>
                                            <label for="Category_name"
                                                class="block text-sm font-bold ml-1 mb-2 dark:text-white">Category_name</label>
                                            <div class="relative">
                                                <input type="text" id="Category_name" name="category_name"
                                                    class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm"
                                                    required aria-describedby="Category_name-error">
                                            </div>
                                        </div>
                                        <button type="submit" name="addCategory"
                                            class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Add
                                            Catigory</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>




                <!-- tablue -->
                <div class="container mx-auto p-4">
                    <!-- <div class="overflow-x-auto"> -->
                    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-2 px-4">id</th>
                                <th class="py-2 px-4">Categroy</th>
                                <th class="py-2 px-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    if ($Categories) {
                      foreach($Categories as $Category){
                  ?>
                            <tr class="border-b">
                                <td class="py-2 px-4"><?= $Category['id']; ?></td>
                                <td class="py-2 px-4"><?= $Category['categorie_name']; ?></td>
                                <td class="py-2 px-4">
                                    <a href="update.php?caty_id=<?= $Category['id']; ?>"
                                        class="text-blue-500 hover:underline"><i class="fa-solid fa-pencil"></i></a> |
                                    <a href="Category.php?id=<?= $Category['id']; ?>"
                                        onclick="return confirm('Are you sure you want to delete this player?')"
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
        </div>

    </div>

    </script>
</body>

</html>