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


<body>
    <?php
    // include(APPROOT . "/views/includes/header.php");
    

    ?>
    <div>

        <img src="<?php echo URLROOT . '/images/logo.jpeg'; ?>" alt="" class="h-[90vh] w-full">
    </div>
    <div class="w-full rounded-lg p-4 mt-16 max-w-7xl mx-auto">
        <h3 class="font-serif text-3xl mx-auto text-center mb-10">Categories</h3>

        <form class="space-y-6" method="POST" action="<?= URLROOT ?>/Pages/index">
            <input type="hidden" name="selectedCategoryId" id="selectedCategoryId" value="">

            <ul class="flex justify-center flex-wrap w-full max-w-7xl mt-4 gap-4">

                <?php foreach ($data['categories'] as $category): ?>

                <li class="">
                    <button type="button"
                        class="p-2 px-3 border-purple-800 mb-4 rounded font-medium hover:bg-transparent hover:border-purple-800 border bg-purple-400/25 dark:bg-purple text-purple-800"
                        onclick="selectCategory('<?php echo $selectedCategoryId = $category['id']; ?>')">
                        <?php echo $category['title']; ?>
                    </button>
                    <?php endforeach; ?>

                    <button type="button" data-modal-toggle="user-modal" onclick="openModal('modelConfirm')"
                        class="p-2 px-6 border-green-700 mb-4 rounded-xl font-medium hover:bg-transparent hover:border-green-800 border bg-green-200 dark:bg-purple text-black">
                        Add Wiki
                    </button>
                    <form class="space-y-6" method="POST" action="<?= URLROOT ?>/Pages/addWiki">
                        <div id="modelConfirm"
                            class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full flex"
                            aria-modal="true" role="dialog">
                            <div class="relative px-4 w-full max-w-2xl h-full md:h-auto">
                                <div class="relative bg-white rounded-2xl shadow-lg">
                                    <div class="flex justify-between items-start p-5 rounded-t border-b">
                                        <h3 class="text-xl font-semibold">Add Wiki</h3>
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
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="title"
                                                    class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                                                <input type="text" name="title" id="title"
                                                    class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                                    placeholder="Bonnie" required="">
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="category"
                                                    class="block mb-2 text-sm font-medium text-gray-900">Category</label>
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
                                                <label for="content"
                                                    class="block mb-2 text-sm font-medium text-gray-900">Content</label>
                                                <textarea name="content" id="content" rows="4"
                                                    class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                                    placeholder="Enter wiki content" required=""></textarea>
                                            </div>
                                            <div class="col-span-6">
                                                <label for="body"
                                                    class="block mb-2 text-sm font-medium text-gray-900">Body</label>
                                                <textarea name="body" id="body" rows="4"
                                                    class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                                    placeholder="Enter wiki body" required=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items-center p-6 rounded-b border-t border-gray-200">
                                        <button
                                            class="text-white rounded-lg bg-gradient-to-br from-pink-500 to-voilet-500 shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform text-sm px-5 py-2.5 text-center"
                                            type="submit">Save all</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>






                    <?php if ($category['id'] == $selectedCategoryId): ?>
                    <section class="py-6 sm:py-12  text-gray-800 w-full max-w-7xl">
                        <div class="container p-6 mx-auto space-y-8">

                            <div class="grid grid-cols-1 gap-x-4 gap-y-8 md:grid-cols-2 lg:grid-cols-4">
                                <?php foreach ($data['wikis'] as $wiki):
                                        ?>
                                <form class="space-y-6" method="POST" action="<?= URLROOT ?>/Pages/wiki" id="wikiForm">

                                    <input type="hidden" name="selectedWikiId" id="selectedWikiId"
                                        value="<?= $wiki["id"] ?>">
                                    <button name="submitForm"
                                        class="flex flex-col hover:border-purple-600 hover:ring-purple-600 hover:shadow-lg transition duration-300 ease-in-out">
                                        <a rel="noopener noreferrer" href="#">
                                            <img alt="" class=" object-cover w-full h-52 bg-gray-500"
                                                src="<?php echo URLROOT . '/images/w1.jpeg'; ?>">
                                        </a>
                                        <div class="flex flex-col flex-1 p-6">
                                            <a rel="noopener noreferrer" href="#"
                                                aria-label="<?php echo $wiki['title']; ?>"></a>
                                            <a rel="noopener noreferrer" href="#"
                                                class="text-xs tracking-uppercase hover:underline text-violet-600">
                                                <?php echo $wiki['name']; ?>
                                            </a>
                                            <h3 class="flex-1 py-2 text-lg font-semibold leading-tight">
                                                <?php echo $wiki['content']; ?>
                                            </h3>
                                            <div
                                                class="flex flex-wrap justify-between pt-3 space-x-2 text-xs text-gray-600">
                                                <span>
                                                    <?php echo date('F j, Y', strtotime($wiki['created_at'])); ?>
                                                </span>
                                                <span>
                                                    <?php echo ($wiki['name']); ?>
                                                </span>
                                            </div>
                                        </div>
                                    </button>
                                </form>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>

                    <?php endif; ?>
                </li>
            </ul>
            <button type="submit" style="display: none;"></button>
        </form>


    </div>





    <script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
        document.getElementsByTagName("body")[0].classList.add("overflow-y-hidden");
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        document.getElementsByTagName("body")[0].classList.remove("overflow-y-hidden");
    }

    function submitForm(selectedWikiId) {
        // Set the selectedWikiId input field value
        document.getElementById('selectedWikiId').value = selectedWikiId;

        // Submit the form
        document.getElementById('wikiForm').submit();
    }

    function selectCategory(categoryId) {
        document.getElementById('selectedCategoryId').value = categoryId;
        document.forms[0].submit();
    }

    document.addEventListener('alpine:init', () => {
        Alpine.store('accordion', {
            tab: 0
        });

        Alpine.data('accordion', (idx) => ({
            init() {
                this.idx = idx;
            },
            idx: -1,
            handleClick() {
                this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this
                    .idx;
            },
            handleRotate() {
                return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
            },
            handleToggle() {
                return this.$store.accordion.tab === this.idx ?
                    `max-height: ${this.$refs.tab.scrollHeight}px` : '';
            }
        }));
    })
    // Add this line to hide the modal by default
    </script>

</body>

</html>