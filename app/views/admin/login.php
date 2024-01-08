<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a4fc922de4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>

    <div class="bg-gradient-to-br from-purple-700 to-pink-500 min-h-screen flex flex-col justify-center items-center">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-md">
            <h1 class="text-4xl font-bold text-center text-purple-700 mb-8">Welcome to My Website</h1>
            <form class="space-y-6" method="POST" action="<?= URLROOT ?>/AdminController/login">
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="w-full px-4 py-2 rounded-lg border border-gray-400" id="email" name="email"
                        type="email">
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="password">
                        Password
                    </label>
                    <input class="w-full px-4 py-2 rounded-lg border border-gray-400" id="password" name="password"
                        type="password">
                </div>
                <div>
                    <button class="w-full bg-purple-700 hover:bg-purple-900 text-white font-bold py-2 px-4 rounded-lg">
                        Log In
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>