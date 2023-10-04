<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-purple-700 to-blue-600 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
        <h1 class="text-3xl font-bold text-center text-purple-700 mb-6">Login</h1>
        <form action="/login" method="POST" class="space-y-4">
            @csrf
            <div class="flex flex-col">
                <label for="loginname" class="text-sm text-gray-600">Name</label>
                <input name="loginname" type="text" placeholder="Name" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
            </div>
            <div class="flex flex-col">
                <label for="loginpassword" class="text-sm text-gray-600">Password</label>
                <input name="loginpassword" type="password" placeholder="Password" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
            </div>
            <button type="submit" class="bg-purple-700 text-white py-2 px-4 rounded-lg hover:bg-purple-800 transition duration-300">Log in</button>
        </form>
        <p class="text-center text-sm text-gray-600 mt-4">Don't have an account? <a href="{{ route('register.dashboard') }}" class="text-purple-700 hover:underline">Register</a></p>
    </div>
</body>

</html>