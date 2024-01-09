<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include(APPROOT . "/views/includes/adminsd.php");
    ?>
    <?php
    // include(APPROOT . "/views/includes/nav.php");
    // var_dump($data['categories']
    
    ?>

    <div id="main-content" class="h-full bg-gray-50 relative overflow-y-auto lg:ml-64 py-10">

        <main>
            <div class="flex flex-col my-6 mx-4 rounded-2xl shadow-xl shadow-gray-200">
                <div class="overflow-x-auto rounded-2xl">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow-lg">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed">

                                <thead class="bg-white">
                                    <tr>
                                        <th scope="col" class="p-2 lg:p-5">
                                            <div class="flex items-center">
                                                <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                                    class="w-5 h-5 rounded border-gray-300 focus:ring-0 checked:bg-dark-900">
                                                <label for="checkbox-all" class="sr-only">checkbox</label>
                                            </div>
                                        </th>
                                        <th scope="col"
                                            class="p-2 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            Name
                                        </th>

                                        <th scope="col"
                                            class="p-2 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            Edit
                                        </th>
                                        <th scope="col"
                                            class="p-2 text-sm font-medium text-left text-gray-500 uppercase lg:p-5">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php foreach ($data['categories'] as $category): ?>
                                    <tr class="hover:bg-gray-100">
                                        <td class="p-2 w-4 lg:p-5">
                                            <div class="flex items-center">
                                                <input id="checkbox-2" aria-describedby="checkbox-1" type="checkbox"
                                                    class="w-5 h-5 rounded border-gray-300 focus:ring-0 checked:bg-dark-900">
                                                <label for="checkbox-2" class="sr-only">checkbox</label>
                                            </div>
                                        </td>
                                        <td
                                            class="flex items-center p-2 mr-8 space-x-6 whitespace-nowrap lg:p-5 lg:mr-0">
                                            <div class="text-sm font-normal text-gray-500">
                                                <div class="text-sm font-semibold text-gray-900">
                                                    <?php echo $category['title']; ?>
                                                </div>
                                            </div>
                                        </td>


                                        <td class="p-2 space-x-2 whitespace-nowrap lg:p-5">

                                            <button type="button" data-modal-toggle="user-modal"
                                                onclick="openModal('modelConfirm')"
                                                class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 hover:text-gray-900 hover:scale-[1.02] transition-all">
                                                <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Edit
                                            </button>

                                            <div id="modelConfirm"
                                                class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full flex"
                                                id="add-user-modal" aria-modal="true" role="dialog">
                                                <div class="relative px-4 w-full max-w-2xl h-full md:h-auto mx-auto">

                                                    <div class="relative bg-white rounded-2xl shadow-lg mx-auto">

                                                        <div
                                                            class="flex justify-between items-start p-5 rounded-t border-b">
                                                            <h3 class="text-xl font-semibold">
                                                                edit
                                                                <?php $category['id'] ?>Catgory
                                                            </h3>
                                                            <button type="button" onclick="closeModal('modelConfirm')"
                                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-2xl text-sm p-1.5 ml-auto inline-flex items-center"
                                                                data-modal-toggle="add-user-modal">
                                                                <svg class="w-5 h-5" fill="currentColor"
                                                                    viewBox="0 0 20 20"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd"
                                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                            </button>
                                                        </div>

                                                        <div class="p-6 space-y-6">
                                                            <form id="EditCategoryForm" method="POST"
                                                                enctype="multipart/form-data"
                                                                class="items-center space-y-4">


                                                                <div class="grid grid-cols-6 gap-6">
                                                                    <div class="col-span-6 sm:col-span-3">
                                                                        <label for="category-name"
                                                                            class="block mb-2 text-sm font-medium text-gray-900">Category
                                                                            Name</label>
                                                                        <input type="hidden" name="categoryId"
                                                                            id="categoryId">

                                                                        <input type="text" name="categoryName"
                                                                            id="categoryName"
                                                                            class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                                                            placeholder="enter the category name"
                                                                            required="">
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="items-center p-6 rounded-b border-t border-gray-200">
                                                                    <button id="updateCat"
                                                                        class="text-white rounded-lg bg-gradient-to-br from-pink-500 to-voilet-500 shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform font-medium text-sm px-5 py-2.5 text-center"
                                                                        type="submit">edit Category</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </td>
                                        <td class="p-2 space-x-2 whitespace-nowrap ">
                                            <form action="<?= URLROOT ?>/Admin/deleteCategory" method="POST">
                                                <input type="hidden" name="categoryId" value="<?= $category['id'] ?>">
                                                <button type="submit" data-modal-toggle="delete-user-modal"
                                                    class="inline-flex items-center py-1 px-2 text-base font-medium text-center text-white bg-gradient-to-br from-red-400 to-red-600 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                                                    <svg class="mr-2 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>

                                        </td>
                                    </tr>

                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
    // Add this line to hide the modal by default
    document.getElementById('modelConfirm').style.display = 'none';

    window.openModal = function(modalId) {
        document.getElementById(modalId).style.display = "block";
        document.getElementsByTagName("body")[0].classList.add("overflow-y-hidden");
    };

    window.closeModal = function(modalId) {
        document.getElementById(modalId).style.display = "none";
        document.getElementsByTagName("body")[0].classList.remove("overflow-y-hidden");
    };

    // Close all modals when press ESC
    document.onkeydown = function(event) {
        event = event || window.event;
        if (event.keyCode === 27) {
            document
                .getElementsByTagName("body")[0]
                .classList.remove("overflow-y-hidden");
            let modals = document.getElementsByClassName("modal");
            Array.prototype.slice.call(modals).forEach((i) => {
                i.style.display = "none";
            });
        }
    };
    </script>
</body>

</html>