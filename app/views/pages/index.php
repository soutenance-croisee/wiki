<!DOCTYPE html>
<html lang="en">

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

                    <a href="<?= URLROOT ?>/pages/addWiki" data-modal-toggle="user-modal"
                        class="p-2 px-6 border-green-700 mb-4 rounded-xl font-medium hover:bg-transparent hover:border-green-800 border bg-green-200 dark:bg-purple text-black">
                        Add Wiki
                    </a>






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
                                                        src="<?php echo URLROOT . '/public/' . $wiki['image_wiki']; ?>">
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
        document.getElementById('saveAllBtn').addEventListener('click', function (event) {
            console.log('Save all button clicked!');
            // You can add more actions here if needed
        });


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