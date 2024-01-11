<!DOCTYPE html>
<html lang="en">

<!-- component -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="./assets/styles/styles.css" /> -->
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
</head>


<form id="addwikiForm" class="space-y-6" method="POST" action="<?= URLROOT ?>/Pages/addingWiki"
    enctype="multipart/form-data">
    <div class="overlay fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50" aria-modal="true"
        role="dialog">
        <div class="modal md:w-1/2 mx-auto p-6 bg-white rounded-2xl shadow-md border">
            <div class="flex justify-end">
                <button type="button" class="text-gray-500 hover:text-gray-300 focus:outline-none"
                    data-modal-toggle="add-user-modal">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <div class="p-6 space-y-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                        <input type="text" name="title" id="title"
                            class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                            placeholder="Bonnie" required="">
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                        <select name="category" id="category"
                            class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                            required="">
                            <?php foreach ($data['categories'] as $category): ?>
                                <option value="<?= $category['id'] ?>">
                                    <?= $category['title'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-span-6">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Image</label>
                        <input type="file" name="image" id="image" accept="image/*"
                            class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5">
                    </div>
                    <div class="col-span-6">
                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Content</label>
                        <textarea name="content" id="content" rows="4"
                            class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                            placeholder="Enter wiki content" required=""></textarea>
                    </div>

                    <div class="col-span-6">
                        <label for="body" class="block mb-2 text-sm font-medium text-gray-900">Body</label>
                        <textarea name="body" id="body" rows="4"
                            class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                            placeholder="Enter wiki body" required=""></textarea>
                    </div>


                </div>
            </div>

            <div class="items-center p-6 rounded-b border-t border-gray-200">
                <button
                    class="text-white rounded-lg bg-gradient-to-br from-pink-500 to-voilet-500 shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform text-sm px-5 py-2.5 text-center"
                    type="submit" id="saveAllBtn">Save all</button>
            </div>
        </div>
    </div>
</form>



<body>