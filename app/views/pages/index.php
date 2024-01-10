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
    include(APPROOT . "/views/includes/header.php");


    ?>
    <div>

        <img src="<?php echo URLROOT . '/images/logo.jpeg'; ?>" alt="" class="h-[90vh] w-full">
    </div>
    <div class="w-full rounded-lg p-4 mt-16 max-w-xl mx-auto">
        <h3 class="font-serif text-3xl mx-auto text-center mb-10">Categories</h3>

        <form class="space-y-6" method="POST" action="<?= URLROOT ?>/Pages/index">
            <!-- Hidden input to store the selected category ID -->
            <input type="hidden" name="selectedCategoryId" id="selectedCategoryId" value="">

            <ul class="flex items-start flex-wrap mt-4 gap-4">
                <li class="">
                    <a class="p-2 px-3 border-purple-800 mb-4 rounded font-medium hover:bg-transparent hover:border-purple-800 border bg-purple-400/25 dark:bg-purple text-purple-800"
                        href="javascript:;" onclick="selectCategory('all')">
                        all
                    </a>
                </li>
                <?php foreach ($data['categories'] as $category): ?>
                    <li class="">
                        <button type="button"
                            class="p-2 px-3 border-purple-800 mb-4 rounded font-medium hover:bg-transparent hover:border-purple-800 border bg-purple-400/25 dark:bg-purple text-purple-800"
                            onclick="selectCategory('<?php echo $selectedCategoryId = $category['id']; ?>')">
                            <?php echo $category['title']; ?>
                        </button>
                    <?php endforeach; ?>

                    <?php if ($category['id'] == $selectedCategoryId): ?>
                        <ul>
                            <?php foreach ($data['wikis'] as $wiki): ?>
                                <li>
                                    <?php echo $wiki['name']; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            </ul>
            <button type="submit" style="display: none;"></button>
        </form>


    </div>




    <main id="faq" class=" p-5 bg-light-blue -mt-20">
        <div class="flex justify-center items-start my-2">
            <div class="w-full sm:w-10/12 md:w-1/2 my-1">
                <div class="flex flex-col items-center  mt-24">

                    <h3 class="font-serif text-3xl mx-auto text-center mb-10">FAQ</h3>
                </div>
                <ul class="flex flex-col items-center justify-center">
                    <li class="bg-white my-2 shadow-lg w-[80vw] " x-data="accordion(1)">
                        <h2 @click="handleClick()"
                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                            <span>When will my order arrive?</span>
                            <svg :class="handleRotate()"
                                class="fill-current text-purple-600 h-6 w-6 transform transition-transform duration-500"
                                viewBox="0 0 20 20">
                                <path
                                    d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                                </path>
                            </svg>

                        </h2>
                        <div x-ref="tab" :style="handleToggle()"
                            class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all">
                            <p class="p-3 text-gray-900">
                                Shipping time is set by our delivery partners, according to the
                                delivery method
                                chosen by you. Additional details can be found in the order
                                confirmation
                            </p>
                        </div>
                    </li>
                    <li class="bg-white my-2 shadow-lg  w-[80vw]" x-data="accordion(2)">
                        <h2 @click="handleClick()"
                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                            <span>How do I track my order?</span>
                            <svg :class="handleRotate()"
                                class="fill-current text-purple-600 h-6 w-6 transform transition-transform duration-500"
                                viewBox="0 0 20 20">
                                <path
                                    d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                                </path>
                            </svg>
                        </h2>
                        <div class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
                            x-ref="tab" :style="handleToggle()">
                            <p class="p-3 text-gray-900">
                                Once shipped, you’ll get a confirmation email that includes a
                                tracking number
                                and additional information regarding tracking your order.
                            </p>
                        </div>
                    </li>
                    <li class="bg-white my-2 shadow-lg  w-[80vw]" x-data="accordion(3)">
                        <h2 @click="handleClick()"
                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                            <span>What’s your return policy?</span>
                            <svg :class="handleRotate()"
                                class="fill-current text-purple-600 h-6 w-6 transform transition-transform duration-500"
                                viewBox="0 0 20 20">
                                <path
                                    d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                                </path>
                            </svg>
                        </h2>
                        <div class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
                            x-ref="tab" :style="handleToggle()">
                            <p class="p-3 text-gray-900">
                                We allow the return of all items within 30 days of your original
                                order’s date.
                                If you’re interested in returning your items, send us an email
                                with your order
                                number and we’ll ship a return label.
                            </p>
                        </div>
                    </li>
                    <li class="bg-white my-2 shadow-lg  w-[80vw]" x-data="accordion(4)">
                        <h2 @click="handleClick()"
                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                            <span>How do I make changes to an existing order?</span>
                            <svg :class="handleRotate()"
                                class="fill-current text-purple-600 h-6 w-6 transform transition-transform duration-500"
                                viewBox="0 0 20 20">
                                <path
                                    d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                                </path>
                            </svg>
                        </h2>
                        <div class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
                            x-ref="tab" :style="handleToggle()">
                            <p class="p-3 text-gray-900">
                                Changes to an existing order can be made as long as the order is
                                still in
                                “processing” status. Please contact our team via email and we’ll
                                make sure to
                                apply the needed changes. If your order has already been
                                shipped, we cannot
                                apply any changes to it. If you are unhappy with your order when
                                it arrives,
                                please contact us for any changes you may require.
                            </p>
                        </div>
                    </li>
                    <li class="bg-white my-2 shadow-lg  w-[80vw]" x-data="accordion(5)">
                        <h2 @click="handleClick()"
                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                            <span>What shipping options do you have?</span>
                            <svg :class="handleRotate()"
                                class="fill-current text-purple-600 h-6 w-6 transform transition-transform duration-500"
                                viewBox="0 0 20 20">
                                <path
                                    d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                                </path>
                            </svg>
                        </h2>
                        <div class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
                            x-ref="tab" :style="handleToggle()">
                            <p class="p-3 text-gray-900">
                                For USA domestic orders we offer FedEx and USPS shipping.
                            </p>
                        </div>
                    </li>
                    <li class="bg-white my-2 shadow-lg  w-[80vw]" x-data="accordion(6)">
                        <h2 @click="handleClick()"
                            class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer">
                            <span>What payment methods do you accept?</span>
                            <svg :class="handleRotate()"
                                class="fill-current text-purple-600 h-6 w-6 transform transition-transform duration-500"
                                viewBox="0 0 20 20">
                                <path
                                    d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10">
                                </path>
                            </svg>
                        </h2>
                        <div class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
                            x-ref="tab" :style="handleToggle()">
                            <p class="p-3 text-gray-900">
                                Any method of payments acceptable by you. For example: We accept
                                MasterCard,
                                Visa, American Express, PayPal, JCB Discover, Gift Cards, etc.
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </main>
    <script>
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
    </script>

</body>

</html>