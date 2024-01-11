<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wikis</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
</head>

<body>
    <div class="p-2 md:p-12">
        <?php foreach ($data['categories'] as $category): ?>
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">
                <?= $category['title']; ?>
            </h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <?php foreach ($data['wikis'] as $wiki): ?>
                <?php if ($wiki['category_id'] == $category['id']): ?>
                <div
                    class="cursor-pointer mb-4 p-6 rounded-xl bg-white flex flex-col border border-gray-300 relative transition duration-300 transform hover:shadow-lg hover:border-fuchsia-500">
                    <!-- ... (Author Info) ... -->

                    <!-- Wiki Content -->
                    <img alt="" class=" object-cover w-full h-52 bg-gray-500"
                        src="<?php echo URLROOT . '/public/' . $wiki['image_wiki']; ?>">
                    <h2 class="text-xl font-extrabold text-sm mb-2">
                        <?= substr($wiki['title'], 0, 70); ?>
                        <?= strlen($wiki['title']) > 70 ? '...' : ''; ?>
                    </h2>
                    <div class="py-4 text-sm">
                        <p>
                            <?= substr($wiki['content'], 0, 100); ?>
                            <?= strlen($wiki['content']) > 100 ? '...' : ''; ?>
                        </p>
                    </div>

                    <!-- Tags -->
                    <?php if (!empty($wiki['tag_names'])): ?>
                    <div class="flex space-x-2 text-sm text-gray-500">
                        <?php $tags = explode(',', $wiki['tag_names']); ?>
                        <?php foreach ($tags as $tag): ?>
                        <span
                            class="bg-blue-200 text-blue-800 text-sm font-medium me-2 cursor-pointer px-3 py-1 rounded">
                            #
                            <?= trim($tag); ?>
                        </span>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <!-- Delete Button (X) -->
                    <form method="post" action="<?= URLROOT ?>/WikiController/deleteWiki">
                        <input type="hidden" name="wiki_id" value="<?= $wiki['id']; ?>">
                        <button type="submit" class="absolute top-2 right-2 text-red-500 hover:text-red-700">X</button>
                    </form>

                    <!-- Update Button -->
                    <a href="<?= URLROOT ?>/Pages/updateWiki/<?= $wiki['id']; ?>"
                        class="absolute top-2 left-2 text-blue-500 hover:text-blue-700">Update</a>



                </div>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>


    </div>


</body>

</html>