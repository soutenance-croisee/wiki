<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a4fc922de4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <nav class="fixed z-30  bg-gray-50">
        <div class="py-3 px-3 lg:px-5 lg:pl-3">
            <div class="flex justify-between items-center">
                <div class="flex justify-start items-center">
                    <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
                        class="p-2 mr-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100">
                        <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <a href="https://demos.creative-tim.com/soft-ui-flowbite/"
                        class="text-md font-semibold flex items-center lg:mr-1.5">
                        <img src="https://demos.creative-tim.com/soft-ui-flowbite/images/logo.svg" class="mr-2 h-8"
                            alt="Creative Tim Logo">
                        <span class="hidden md:inline-block self-center text-xl font-bold whitespace-nowrap">Soft UI
                            Flowbite</span>
                    </a>
                    <form action="#" method="GET" class="hidden lg:block lg:pl-8">
                        <label for="topbar-search" class="sr-only">Search</label>
                        <div class="relative mt-1 lg:w-80">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" name="email" id="topbar-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full pl-10 p-2.5"
                                placeholder="Search">
                        </div>
                    </form>
                </div>
                <div class="flex items-center">
                    <button id="toggleSidebarMobileSearch" type="button"
                        class="p-2 text-gray-500 rounded-2xl lg:hidden hover:text-gray-900 hover:bg-gray-100">
                        <span class="sr-only">Search</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <span></span>
                    <a href="https://www.creative-tim.com/product/soft-ui-dashboard-pro-flowbite" target="_blank"
                        class="sm:inline-flex ml-5 text-white bg-gradient-to-br from-pink-500 to-voilet-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-3 shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                        <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                            </path>
                        </svg>
                        Upgrade to Pro
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="flex overflow-hidden bg-white pt-16">
        <?php include(APPROOT . "/views/includes/adminsd.php");
        ?>
        <div class="hidden fixed inset-0 z-10 bg-gray-900 opacity-50" id="sidebarBackdrop"></div>
        <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
            <main>
                <div class="px-4 pt-6">
                    <div class="grid grid-cols-1 gap-6 mb-6 w-full xl:grid-cols-2 2xl:grid-cols-4">
                        <div class="bg-white shadow-lg shadow-gray-200 rounded-2xl p-4 ">
                            <div class="flex items-center">
                                <div
                                    class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-white bg-gradient-to-br from-pink-500 to-voilet-500 rounded-lg shadow-md shadow-gray-300">
                                    <i class="ni ni-money-coins text-lg" aria-hidden="true"></i>
                                </div>
                                <div class="flex-shrink-0 ml-3">
                                    <span class="text-2xl font-bold leading-none text-gray-900">
                                        <?php echo $data['tags_number']['tags_number']; ?>
                                    </span>
                                    <h3 class="text-base font-normal text-gray-500">Your Tags</h3>
                                </div>

                            </div>
                        </div>
                        <div class="bg-white shadow-lg shadow-gray-200 rounded-2xl p-4 ">
                            <div class="flex items-center">
                                <div
                                    class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-white bg-gradient-to-br from-pink-500 to-voilet-500 rounded-lg shadow-md shadow-gray-300">
                                    <i class="ni ni-world text-lg" aria-hidden="true"></i>
                                </div>
                                <div class="flex-shrink-0 ml-3">
                                    <span class="text-2xl font-bold leading-none text-gray-900">
                                        <?php echo $data['users_number']['users_number']; ?>
                                    </span>
                                    <h3 class="text-base font-normal text-gray-500">Today's Users</h3>
                                </div>

                            </div>
                        </div>
                        <div class="bg-white shadow-lg shadow-gray-200 rounded-2xl p-4 ">
                            <div class="flex items-center">
                                <div
                                    class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-white bg-gradient-to-br from-pink-500 to-voilet-500 rounded-lg shadow-md shadow-gray-300">
                                    <i class="ni ni-paper-diploma text-lg" aria-hidden="true"></i>
                                </div>
                                <div class="flex-shrink-0 ml-3">
                                    <span class="text-2xl font-bold leading-none text-gray-900">
                                        <?php echo $data['categories_number']['categories_number']; ?>
                                    </span>


                                    <h3 class="text-base font-normal text-gray-500"> Today's Categories</h3>
                                </div>

                            </div>
                        </div>
                        <div class="bg-white shadow-lg shadow-gray-200 rounded-2xl p-4 ">
                            <div class="flex items-center">
                                <div
                                    class="inline-flex flex-shrink-0 justify-center items-center w-12 h-12 text-white bg-gradient-to-br from-pink-500 to-voilet-500 rounded-lg shadow-md shadow-gray-300">
                                    <i class="ni ni-cart text-lg" aria-hidden="true"></i>
                                </div>
                                <div class="flex-shrink-0 ml-3">
                                    <span class="text-2xl font-bold leading-none text-gray-900">
                                        <?php echo $data['wikis_number']['wikis_number']; ?>
                                    </span>
                                    <h3 class="text-base font-normal text-gray-500">Today's Wikis</h3>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </main>

        </div>
    </div>
</body>

</html>