<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />

</head>

<body class="w-full min-h-screen flex items-center justify-center bg-white text-black mx-auto">

    <div class="w-full mx-auto">

        <h1 class="text-2xl mx-auto text-center font-bold ">
            <?php echo $data['wiki']['title']; ?>
        </h1>
        <?php
        foreach ($data['tags'] as $tag) {
            echo '<span class="bg-purple-800 text-white rounded-full px-2 py-2 mr-2 mb-5">' . $tag['title'] . '</span>';
        }
        ?>

        <div class="flex flex-col gap-2">
            <div class="flex items-center">

                <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144"
                    alt="User profile" class="mr-2 w-10 h-10 rounded-full ">
                <div class="flex flex-col">
                    <div class="flex gap-2">
                        <h1>
                            <?php echo $data['wiki']['author_id']; ?>
                        </h1>
                        <p class="text-green-500">.Follow</p>
                    </div>
                    <p class="text-gray-400 text-xs">
                        <?php
                        $dateTime = new DateTime($data['wiki']['created_at']);
                        echo $dateTime->format('F j, Y');
                        ?>
                    </p>
                </div>
            </div>
        </div>

        <a rel="noopener noreferrer" href="#">
            <img alt="" class="object-cover w-full h-52 bg-gray-500" src="<?php echo URLROOT . '/images/w1.jpeg'; ?>">
        </a>
        <p class="text-black text-xl">
            <?php echo $data['wiki']['body']; ?>
        </p>
    </div>

</body>

</html>