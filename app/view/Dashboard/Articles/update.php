<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Management Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-4xl">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Create / Edit Article</h1>

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
                <input type="text" id="featured_image" name="featured_image" placeholder="Enter image URL" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
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
                <label for="category_id" class="block text-gray-700 font-medium mb-2">Category</label>
                <input type="number" id="category_id" name="category_id" placeholder="Enter category ID" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <!-- Author ID -->
            <div class="mb-4">
                <label for="author_id" class="block text-gray-700 font-medium mb-2">Author</label>
                <input type="number" id="author_id" name="author_id" placeholder="Enter author ID" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">Save Article</button>
            </div>
        </form>
    </div>
</body>
</html>
