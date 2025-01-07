<?php

require_once __DIR__."/../../../../vendor/autoload.php";

use App\Controllers\TagsController;
$dd=TagsController::getTagById();
TagsController::update();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/f01941449c.js" crossorigin="anonymous"></script>
    <title>update Tag</title>
</head>
<body>


<div id="content" role="main" class="w-full  max-w-md mx-auto p-6">
               <div class="mt-7 bg-white  rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700 border-2 border-indigo-300">
                 <div class="p-4 sm:p-7">
                  <div class="text-center">
                    <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Update Tag</h1>
                      <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        Tag_Name
                      </p>
                  </div>

                  <div class="mt-5">
                       <form method="POST">
                         <div class="grid gap-y-4">
                           <div>
                             <label for="tag_name" class="block text-sm font-bold ml-1 mb-2 dark:text-white">tag_name</label>
                                <div class="relative">
                                 <input type="text" id="tag_name" name="tag_name" value="<?= $dd['tag_name'] ?>" class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm" required aria-describedby="tag_name-error">
                                </div>
                            </div>
                                 <button type="submit" name="updateTag" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Update Tag</button>
                         </div>
                       </form>
                  </div>
                 </div>
               </div>
              </div>


</body>
</html>