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
    <?php
    include(APPROOT . "/views/includes/nav.php");


    ?>
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