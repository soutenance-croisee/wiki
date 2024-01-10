<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet"
    href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">


<section class="py-1 bg-blueGray-50">
    <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4 mx-auto mt-24">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <h3 class="font-semibold text-base text-blueGray-700">Wikis page</h3>
                    </div>
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                        <button
                            class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button">See all</button>
                    </div>
                </div>
            </div>

            <div class="block w-full overflow-x-auto">
                <table class="items-center bg-transparent w-full border-collapse ">
                    <thead>
                        <tr>
                            <th
                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                img
                            </th>
                            <th
                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                wiki
                            </th>
                            <th
                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                update
                            </th>
                            <th
                                class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                delete
                            </th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($data['wikis'] as $wiki): ?>
                        <tr>
                            <td
                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                <img src="placeholder_image_url" alt="Wiki Image" class="h-12 w-28 object-cover my-2" />
                            </td>
                            <td
                                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                <?= $wiki['title'] ?>
                            </td>
                            <td
                                class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <button type="button" data-modal-toggle="user-modal"
                                    onclick="openModal('modal_<?php echo $wiki['id']; ?>')"
                                    class="bg-gray-200 text-gray-700 active:bg-red-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">

                                    Edit
                                </button>
                                <dialog id="modal_<?= $category['id'] ?>" class="modal">
                                    <div class="modal-box">
                                        <form method="dialog">
                                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2"
                                                onclick="closeModal(<?= $category['id'] ?>)">✕</button>
                                        </form>
                                        <div class="overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full flex"
                                            id="user-modal" aria-modal="true" role="dialog">
                                            <div class="relative px-4 w-full max-w-2xl h-full md:h-auto">

                                                <div class="relative bg-white rounded-2xl shadow-lg">

                                                    <div
                                                        class="flex justify-between items-start p-5 rounded-t border-b">
                                                        <h3 class="text-xl font-semibold">
                                                            Edit user
                                                        </h3>
                                                        <button type="button"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-2xl text-sm p-1.5 ml-auto inline-flex items-center"
                                                            data-modal-toggle="user-modal">
                                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                        </button>
                                                    </div>

                                                    <div class="p-6 space-y-6">
                                                        <form action="#">
                                                            <div class="grid grid-cols-6 gap-6">
                                                                <div class="col-span-6 sm:col-span-3">
                                                                    <label for="first-name"
                                                                        class="block mb-2 text-sm font-medium text-gray-900">First
                                                                        Name</label>
                                                                    <input type="text" name="first-name" id="first-name"
                                                                        class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                                                        placeholder="Bonnie" required="">
                                                                </div>
                                                                <div class="col-span-6 sm:col-span-3">
                                                                    <label for="last-name"
                                                                        class="block mb-2 text-sm font-medium text-gray-900">Last
                                                                        Name</label>
                                                                    <input type="text" name="last-name" id="last-name"
                                                                        class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                                                        placeholder="Green" required="">
                                                                </div>
                                                                <div class="col-span-6 sm:col-span-3">
                                                                    <label for="email"
                                                                        class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                                                    <input type="email" name="email" id="email"
                                                                        class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                                                        placeholder="example@company.com" required="">
                                                                </div>
                                                                <div class="col-span-6 sm:col-span-3">
                                                                    <label for="phone-number"
                                                                        class="block mb-2 text-sm font-medium text-gray-900">Phone
                                                                        Number</label>
                                                                    <input type="number" name="phone-number"
                                                                        id="phone-number"
                                                                        class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                                                        placeholder="e.g. +(12)3456 789" required="">
                                                                </div>
                                                                <div class="col-span-6 sm:col-span-3">
                                                                    <label for="department"
                                                                        class="block mb-2 text-sm font-medium text-gray-900">Department</label>
                                                                    <input type="text" name="department" id="department"
                                                                        class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                                                        placeholder="Development" required="">
                                                                </div>
                                                                <div class="col-span-6 sm:col-span-3">
                                                                    <label for="company"
                                                                        class="block mb-2 text-sm font-medium text-gray-900">Company</label>
                                                                    <input type="number" name="company" id="company"
                                                                        class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                                                        placeholder="123456" required="">
                                                                </div>
                                                                <div class="col-span-6 sm:col-span-3">
                                                                    <label for="current-password"
                                                                        class="block mb-2 text-sm font-medium text-gray-900">Current
                                                                        Password</label>
                                                                    <input type="password" name="current-password"
                                                                        id="current-password"
                                                                        class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                                                        placeholder="••••••••" required="">
                                                                </div>
                                                                <div class="col-span-6 sm:col-span-3">
                                                                    <label for="new-password"
                                                                        class="block mb-2 text-sm font-medium text-gray-900">New
                                                                        Password</label>
                                                                    <input type="password" name="new-password"
                                                                        id="new-password"
                                                                        class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                                                        placeholder="••••••••" required="">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div class="items-center p-6 rounded-b border-t border-gray-200">
                                                        <button
                                                            class="text-white rounded-lg bg-gradient-to-br from-pink-500 to-voilet-500 shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform text-sm px-5 py-2.5 text-center"
                                                            type="submit">Save all</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                </dialog>

                            </td>
                            <td
                                class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                <button
                                    class="bg-red-500 text-white active:bg-red-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    type="button">Delete</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>


                </table>
            </div>
        </div>
    </div>
    <footer class="relative pt-8 pb-6 mt-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap items-center md:justify-between justify-center">
                <div class="w-full md:w-6/12 px-4 mx-auto text-center">
                    <div class="text-sm text-blueGray-500 font-semibold py-1">
                        Made with <a href="https://www.creative-tim.com/product/notus-js"
                            class="text-blueGray-500 hover:text-gray-800" target="_blank">Notus JS</a> by <a
                            href="https://www.creative-tim.com" class="text-blueGray-500 hover:text-blueGray-800"
                            target="_blank"> Creative Tim</a>.
                    </div>
                </div>
            </div>
        </div>
    </footer>
</section>
<script>
function openModal(modalId) {
    var modal = document.getElementById(modalId);
    if (modal) {
        modal.showModal();
    }
}

function closeModal(categoryId) {
    const modal = document.getElementById(`modal_${categoryId}`);
    modal.close();
}
</script>