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
    include(APPROOT . "/views/includes/nav.php");
    // var_dump($data['categories']);
    
    ?>
    <div id="modelConfirm"
        class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
        <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">

            <div class="flex justify-end p-2">
                <button onclick="closeModal('modelConfirm')" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <div class="p-6 pt-0 text-center">
                <h1 class="text-3xl font-semibold mb-2">
                    Hello,
                    <?php echo $_SESSION["username"]; ?>
                </h1>
                <p class="text-gray-600">Here's some information about your account:</p>

                <div class="mt-4">
                    <label for="email" class="text-sm font-medium text-gray-500">Email:</label>
                    <p class="text-lg font-semibold">
                        <?php echo $_SESSION["email"]; ?>
                    </p>
                </div>

                <div class="mt-6">
                    <a href="#" onclick="closeModal('modelConfirm')"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-4 py-2.5 text-center mr-4">
                        Delete Account
                    </a>

                    <a href="#" onclick="closeModal('modelConfirm')"
                        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-4 py-2.5 text-center"
                        data-modal-toggle="change-password-modal">
                        Change Password
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="main-content" class="h-full bg-gray-50 relative overflow-y-auto lg:ml-64 py-10">
        <div class="flex items-center justify-end ml-auto space-x-2 sm:space-x-3">
            <button type="button" data-modal-toggle="add-user-modal"
                class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-gradient-to-br from-pink-500 to-voilet-500 sm:ml-auto shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                <svg class="mr-2 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd"></path>
                </svg>
                Add Category
            </button>
            <a href="#"
                class="inline-flex justify-center items-center py-2 px-3 w-1/2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:scale-[1.02] transition-transform sm:w-auto">
                <svg class="mr-2 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z"
                        clip-rule="evenodd"></path>
                </svg>
                Export
            </a>
        </div>
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