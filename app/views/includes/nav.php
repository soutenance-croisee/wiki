<nav class="fixed z-30  bg-gray-50 w-full">
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
                    <svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <a href="" class="text-md font-semibold flex items-center lg:mr-1.5">
                    <img src="https://demos.creative-tim.com/soft-ui-flowbite/images/logo.svg" class="mr-2 h-8"
                        alt="Creative Tim Logo">
                    <span class="hidden md:inline-block self-center text-xl font-bold whitespace-nowrap">Easy Wikis
                    </span>
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
                <div class="sm:flex">

                    <div class="flex items-center justify-end ml-auto space-x-2 sm:space-x-3">
                        <button type="button" data-modal-toggle="add-user-modal"
                            class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-gradient-to-br from-pink-500 to-voilet-500 sm:ml-auto shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform"
                            onclick="openModal('modelConfirm')">
                            <svg class=" mr-2 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            Add user
                        </button>

                    </div>
                </div>
                <div id="modelConfirm"
                    class="overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full flex"
                    id="add-user-modal" aria-modal="true" role="dialog">
                    <div class="relative px-4 w-full max-w-2xl h-full md:h-auto mx-auto">

                        <div class="relative bg-white rounded-2xl shadow-lg mx-auto">

                            <div class="flex justify-between items-start p-5 rounded-t border-b">
                                <h3 class="text-xl font-semibold">
                                    Add new user
                                </h3>
                                <button type="button" onclick="closeModal('modelConfirm')"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-2xl text-sm p-1.5 ml-auto inline-flex items-center"
                                    data-modal-toggle="add-user-modal">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>

                            <div class="p-6 space-y-6">
                                <form action="<?= URLROOT ?>/Admin/insertCategory" method="POST">
                                    <!-- Remove the hidden input -->
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="category-name"
                                                class="block mb-2 text-sm font-medium text-gray-900">Category
                                                Name</label>
                                            <input type="text" name="category-name" id="category-name"
                                                class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                                placeholder="enter the category name" required="">
                                        </div>
                                    </div>

                                    <!-- Add a submit button to submit the form -->
                                    <div class="items-center p-6 rounded-b border-t border-gray-200">
                                        <button
                                            class="text-white rounded-lg bg-gradient-to-br from-pink-500 to-voilet-500 shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform font-medium text-sm px-5 py-2.5 text-center"
                                            type="submit">Add Category</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</nav>
<script>
    // Add this line to hide the modal by default
    document.getElementById('modelConfirm').style.display = 'none';

    window.openModal = function (modalId) {
        document.getElementById(modalId).style.display = "block";
        document.getElementsByTagName("body")[0].classList.add("overflow-y-hidden");
    };

    window.closeModal = function (modalId) {
        document.getElementById(modalId).style.display = "none";
        document.getElementsByTagName("body")[0].classList.remove("overflow-y-hidden");
    };

    // Close all modals when press ESC
    document.onkeydown = function (event) {
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