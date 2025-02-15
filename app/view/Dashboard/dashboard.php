<?php 
require_once __DIR__."/../../../vendor/autoload.php";
session_start();
use App\Controllers\TagsController;
use App\Controllers\UsersController;
use App\Controllers\ArticlesController;
use App\Controllers\CategoriesController;

 
$rows = UsersController::show();
$totalUsers = UsersController::CountUsers();
UsersController::logoutview();
$totalTags = TagsController::totalTags();
$totalCategor = CategoriesController::totalCategories();
$result=UsersController::updateUserStatus();
$delte = UsersController::deleteUser();

ArticlesController::checkRole('admin');

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
                    <a href="dashboard.php"
                        class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                    <a href="Users/User.php"
                        class="flex items-center px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-users mr-2"></i> Users
                    </a>
                    <a href="Articles/Article.php"
                        class="flex items-center px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-file-alt mr-2"></i> Articles
                    </a>
                    <a href="Categories/Category.php"
                        class="flex items-center px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-folder-open mr-2"></i> Categories
                    </a>
                    <a href="Tags/Tag.php"
                        class="flex items-center px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-tags mr-2"></i> Tags
                    </a>
                    <?php } elseif($_SESSION['role'] === 'author'){?>  

                    <a href="Articles/Article.php"
                        class="flex items-center px-4 py-2 mt-2 text-gray-300 hover:bg-gray-700 rounded-md">
                        <i class="fas fa-file-alt mr-2"></i> Articles
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

                <!-- button Ajouter  -->
                <div class="btnAjouter">
                    <button id="btnAjouter" class="h-10 w-24 bg-blue-600 text-white rounded shadow-lg">Add </button>
                </div>

            </div>

            <div class="flex-col max-w-7xl mx-auto px-4 sm:px-6 lg:py-8 lg:px-8">
                <h2 class="text-3xl mb-10 font-extrabold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                    Statistiques</h2>
                <div
                    class="flex justify-center items-center gap-[0.5rem] bg-gray-100 overflow-hidden sm:rounded-lg dark:bg-gray-900 flex-wrap justify-center items-center">
                    <!-- //card users -->
                    <div
                        class="p-10 sm:p-6 flex justify-center items-center gap-10 bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-900">
                        <div id="cercle" class="flex flex-col justify-center items-center ">
                            <div class="bg-[#4ade80]  h-16 w-16 rounded-full flex flex-col justify-center items-center">
                                <i class="fa-solid fa-users fa-xl"></i>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center items-center">
                            <h2 class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Total
                                Users</h2>
                            <p class="mt-1 text-3xl leading-9 font-semibold text-indigo-600 dark:text-indigo-400">
                                <?php echo $totalUsers ?>
                            </p>
                        </div>
                    </div>

                    <!-- //card Article -->
                    <div
                        class="p-10 sm:p-6 flex justify-center items-center gap-10 bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-900">
                        <div id="cercle" class="flex flex-col justify-center items-center ">
                            <div class="bg-[#22d3ee] h-16 w-16 rounded-full flex flex-col justify-center items-center">
                                <i class="fas fa-newspaper fa-xl"></i>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center items-center">
                            <h2 class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Total
                                Article</h2>
                            <p class="mt-1 text-3xl leading-9 font-semibold text-indigo-600 dark:text-indigo-400">
                                <?php echo $totalTags ?></p>
                        </div>
                    </div>

                    <!-- //card tags -->
                    <div
                        class="p-10 sm:p-6 flex justify-center items-center gap-10 bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-900">
                        <div id="cercle" class="flex flex-col justify-center items-center ">
                            <div class="bg-[#c084fc] h-16 w-16 rounded-full flex flex-col justify-center items-center">
                                <i class="fas fa-tags fa-xl"></i>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center items-center">
                            <h2 class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Total
                                Tags</h2>
                            <p class="mt-1 text-3xl leading-9 font-semibold text-indigo-600 dark:text-indigo-400">
                                <?php echo $totalUsers ?></p>
                        </div>
                    </div>

                    <!-- //card categories -->
                    <div
                        class="p-10 sm:p-6 flex justify-center items-center gap-10 bg-white overflow-hidden shadow sm:rounded-lg dark:bg-gray-900">
                        <div id="cercle" class="flex flex-col justify-center items-center ">
                            <div class="bg-[#fcd34d] h-16 w-16 rounded-full flex flex-col justify-center items-center">
                                <i class="fas fa-folder fa-xl"></i>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center items-center">
                            <h2 class="text-sm leading-5 font-medium text-gray-500 truncate dark:text-gray-400">Total
                                Categories</h2>
                            <p class="mt-1 text-3xl leading-9 font-semibold text-indigo-600 dark:text-indigo-400">
                                <?php echo $totalCategor ?></p>
                        </div>
                    </div>
                </div>
            </div>


            <!-- tablue -->
            <div class="container mx-auto p-4">
                <div>
                    <h2 class="text-2xl mb-10 font-extrabold tracking-tight text-gray-900 sm:text-2xl dark:text-white">
                        Users Info</h2>
                </div>
                <!-- <div class="overflow-x-auto"> -->
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-2 px-4">Username</th>
                            <th class="py-2 px-4">Email</th>
                            <th class="py-2 px-4">Role</th>
                            <th class="py-2 px-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            if ($rows) {
                foreach ($rows as $row) { ?>
                        <form method="POST">

                            <tr class="border-b">
                                <td class="py-2 px-4"><?= $row['username']; ?></td>
                                <td class="py-2 px-4"><?= $row['email']; ?></td>
                                <td class="py-2 px-4">
                                    <select name="role">
                                        <option value="<?= $row['role'] ?>"><?= $row['role'] ?>
                                        </option>
                                        <option value="admin">Admin
                                        </option>
                                        <option value="author">Author
                                        </option>
                                        <option value="user">User
                                        </option>
                                    </select>
                                </td>
                                <td class="py-2 px-4">
                                    <input type="hidden" name="UserId" value="<?= $row['id']; ?>">
                                    <button type="submit" name="updateUser" class="text-blue-500 hover:underline">
                                        <i class="fa-solid fa-pencil"></i>
                                    </button> | 
                                    <button type="submit" name="deleteUser" onclick="return confirm('Are you sure you want to delete this player?')"
                                        class="text-red-500 hover:underline">>
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    <!-- <a href="dashboard.php?id="
                                        onclick="return confirm('Are you sure you want to delete this player?')"
                                        class="text-red-500 hover:underline">
                                        <i class="fa-solid fa-trash"></i>
                                    </a> -->
                                </td>
                            </tr>
                        </form>

                        <?php }
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