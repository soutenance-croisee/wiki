<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gradient-to-br from-purple-700 to-pink-500 min-h-screen flex flex-col justify-center items-center">

    <div class="bg-white rounded-lg shadow-lg p-8 max-w-md">
        <h1 class="text-4xl font-bold text-center text-purple-700 mb-8">Sign Up for My Website</h1>
        <form class="space-y-6" method="POST" action="<?= URLROOT ?>/UsersController/register">


            <!-- Username Input -->
            <div>
                <label class="block text-gray-700 font-bold mb-2" for="username">
                    Username
                </label>
                <input
                    class="w-full px-4 py-2 rounded-lg border <?= (!empty($data['username_err']) ? 'border-red-500' : 'border-gray-400') ?>"
                    id="username" name="username" type="text">
                <?php if (!empty($data['username_err'])): ?>
                    <p class="text-red-500 text-sm mt-1">
                        <?= $data['username_err'] ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Email Input -->
            <div>
                <label class="block text-gray-700 font-bold mb-2" for="email">
                    Email
                </label>
                <input
                    class="w-full px-4 py-2 rounded-lg border <?= (!empty($data['email_err']) ? 'border-red-500' : 'border-gray-400') ?>"
                    id="email" name="email" type="email">
                <?php if (!empty($data['email_err'])): ?>
                    <p class="text-red-500 text-sm mt-1">
                        <?= $data['email_err'] ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Password Input -->
            <div>
                <label class="block text-gray-700 font-bold mb-2" for="password">
                    Password
                </label>
                <input
                    class="w-full px-4 py-2 rounded-lg border <?= (!empty($data['password_err']) ? 'border-red-500' : 'border-gray-400') ?>"
                    id="password" name="password" type="password">
                <?php if (!empty($data['password_err'])): ?>
                    <p class="text-red-500 text-sm mt-1">
                        <?= $data['password_err'] ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Sign Up Button -->
            <div>
                <button class="w-full bg-purple-700 hover:bg-purple-900 text-white font-bold py-2 px-4 rounded-lg">
                    Sign Up
                </button>
            </div>
        </form>

        <!-- Login Link -->
        <div class="text-center mt-4">
            <p class="text-gray-700">Already have an account?
                <a href="<?php echo APPROOT . 'users/login'; ?>"
                    class="text-purple-700 font-bold hover:underline">Login</a>
            </p>
        </div>
    </div>

</body>

</html>