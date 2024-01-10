<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>
        <?php echo $data['wiki']['title']; ?>
    </h1>
    <a rel="noopener noreferrer" href="#">
        <img alt="" class=" object-cover w-full h-52 bg-gray-500" src="<?php echo URLROOT . '/images/w1.jpeg'; ?>">
    </a>
    <p>
        <?php echo $data['wiki']['TEXT']; ?>
    </p>


</body>

</html>