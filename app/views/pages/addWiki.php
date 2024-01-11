<?php require APPROOT . '/includes/messages.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
</head>

<body class="overflow-y-auto">

    <form id="editWikiForm" method="POST" enctype="multipart/form-data"
        action="<?php echo URLROOT; ?>/WikiController/EditWiki">
        <div class="overlay fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50"
            aria-modal="true" role="dialog">
            <div class="modal h-full w-2/3 mx-auto p-6 bg-white rounded-2xl shadow-md border overflow-y-auto">
                <div class="flex justify-end">
                    <button type="button" class="text-gray-500 hover:text-gray-300 focus:outline-none"
                        data-modal-toggle="add-user-modal">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>

                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="editTitle" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                            <input type="text" name="editTitle" id="editTitle"
                                class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                placeholder="Bonnie" value="<?php echo htmlspecialchars($data['title']); ?>"
                                required="">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="editCategory"
                                class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                            <select name="editCategory" id="editCategory"
                                class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                required="">
                                <?php foreach ($data['categories'] as $category): ?>
                                    <option value="<?= $category['id'] ?>" <?php echo ($data['categoryId'] == $category['id']) ? 'selected' : ''; ?>>
                                        <?= $category['title'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-span-6">
                            <label for="editImage" class="block mb-2 text-sm font-medium text-gray-900">Image</label>
                            <input type="file" name="editImage" id="editImage" accept="image/*"
                                class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5">
                        </div>

                        <div class="col-span-6">
                            <label for="editContent"
                                class="block mb-2 text-sm font-medium text-gray-900">Content</label>
                            <textarea name="editContent" id="editContent" rows="4"
                                class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                placeholder="Enter wiki content"
                                required=""><?php echo htmlspecialchars($data['content']); ?></textarea>
                        </div>

                        <div class="col-span-6">
                            <label for="editBody" class="block mb-2 text-sm font-medium text-gray-900">Body</label>
                            <textarea name="editBody" id="editBody" rows="4"
                                class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                placeholder="Enter wiki body"
                                required=""><?php echo htmlspecialchars($data['body']); ?></textarea>
                        </div>

                        <div class="col-span-6">
                            <label for="editTags" class="block mb-2 text-sm font-medium text-gray-900">Tags</label>
                            <div>
                                <div class="flex items-center space-x-2">
                                    <input id="editTagInput" type="text" name="editTags" placeholder="Enter tags"
                                        class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5">
                                    <button type="button" onclick="addTag()"
                                        class="text-white bg-blue-500 rounded-md px-4 py-2">Add Tag</button>
                                </div>
                                <div id="editTagsContainer" class="flex flex-wrap mt-2">
                                    <?php foreach ($data['tags'] as $tag): ?>
                                        <span
                                            class="bg-blue-200 text-blue-800 text-sm font-medium me-2 cursor-pointer px-3 py-1 rounded">
                                            #
                                            <?= trim($tag); ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="items-center p-6 rounded-b border-t border-gray-200">
                    <button
                        class="text-white rounded-lg bg-gradient-to-br from-pink-500 to-voilet-500 shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform text-sm px-5 py-2.5 text-center"
                        type="submit" id="editWikiBtn">Edit Wiki</button>
                </div>
            </div>
        </div>
    </form>


    <script>
        function addTag() {
            var tagInput = document.getElementById('tagInput');
            var tagsContainer = document.getElementById('tagsContainer');
            var tag = tagInput.value.trim();

            if (tag !== '') {
                var tagElement = document.createElement('div');
                tagElement.className = 'bg-gray-200 text-gray-800 rounded-full px-3 py-1 text-sm m-1 flex items-center';

                var tagName = document.createElement('span');
                tagName.textContent = tag;

                var removeButton = document.createElement('button');
                removeButton.className = 'ml-2';
                removeButton.innerHTML =
                    '<svg class="h-4 w-4 text-gray-600 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>';
                removeButton.addEventListener('click', function () {
                    tagsContainer.removeChild(tagElement);
                });

                tagElement.appendChild(tagName);
                tagElement.appendChild(removeButton);

                tagsContainer.appendChild(tagElement);
                tagInput.value = ''; // Clear the input after adding the tag
            }
        }
    </script>

</body>

</html>