<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />

</head>

<body>
    <form id="editWikiForm" method="POST" enctype="multipart/form-data" class="items-center space-y-4"
        action="<?php echo URLROOT; ?>/Pages/EditWiki">
        <div class="flex flex-col space-y-4 mt-4">
            <input type="hidden" id="wikiId" name="wikiId" value="">

            <div class="mb-4">
                <label for="editImage" class="block text-sm font-medium text-gray-600 mb-1">Image:</label>
                <input type="file" id="editImage" name="editImage" accept="image/*"
                    class="p-2 w-full border rounded-md">
            </div>

            <!-- Title -->
            <div class="mb-4">
                <label for="editTitle" class="block text-sm font-medium text-gray-600 mb-1">Title:</label>
                <input type="text" id="editTitle" name="editTitle" class="p-2 w-full border rounded-md">
            </div>

            <!-- Content -->
            <div class="mb-4">
                <label for="editContent" class="block text-sm font-medium text-gray-600 mb-1">Content:</label>
                <textarea id="editContent" name="editContent" class="p-2 w-full border rounded-md"></textarea>
            </div>

            <!-- Select Category -->
            <label for="editCategoryId" class="block text-sm font-medium text-gray-600 mb-1">Select Category:</label>
            <select id="editCategoryId" name="editCategoryId" class="p-2 border border-2 border-gray-600 rounded-md">
                <?php foreach ($data['categories'] as $category): ?>
                    <option value="<?php echo $category['id']; ?>">
                        <?php echo htmlspecialchars($category['title']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <!-- Show Existing Tags -->
            <label for="editSelectedTags" class="block text-sm font-medium text-gray-600 mb-1">Existing Tags:</label>
            <?php foreach ($data['tags'] as $tag): ?>
                <span class="bg-blue-200 text-blue-800 text-sm font-medium me-2 cursor-pointer px-3 py-1 rounded">
                    #
                    <?= trim($tag['title']); ?>
                </span>
            <?php endforeach; ?>

            <!-- Editable Tags -->
            <label for="editTags" class="block text-sm font-medium text-gray-600 mb-1">Edit Tags:</label>
            <input type="text" id="editTags" name="editTags" placeholder="Enter tags"
                class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5">

            <!-- Container for Editable Tags -->
            <div id="editTagsContainer" class="space-x-3 space-y-2"></div>
        </div>

        <button type="submit" class="w-full text-white bg-gray-500 rounded-full text-sm px-5 py-2.5">Edit wiki</button>
    </form>

</body>

</html>