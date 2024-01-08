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
    // var_dump($data['categories']);
    
    ?>
    <div id="main-content" class="h-full bg-gray-50 relative overflow-y-auto lg:ml-64 ">
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

</body>

</html>