<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-purple-700 to-blue-600 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
        <h1 class="text-3xl font-bold text-center text-purple-700 mb-6">Register</h1>
        <form action="/register" method="POST" class="space-y-4">
            @csrf
            <div class="flex flex-col">
                <label for="name" class="text-sm text-gray-600">Name</label>
                <input name="name" type="text" placeholder="Name" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
            </div>
            <div class="flex flex-col">
                <label for="email" class="text-sm text-gray-600">Email</label>
                <input name="email" type="text" placeholder="Email" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
            </div>
            <div class="flex flex-col">
                <label for="password" class="text-sm text-gray-600">Password</label>
                <input name="password" type="password" placeholder="Password" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
            </div>
            <div class="flex flex-col">
                <label for="role" class="text-sm text-gray-600">Pick a role</label>
                <select name="role" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600">
                    <option value="admin">Admin</option>
                    <option value="small_business">Small Business</option>
                    <option value="investor">Investor</option>
                </select>
            </div>
            <button type="submit" class="bg-purple-700 text-white py-2 px-4 rounded-lg hover:bg-purple-800 transition duration-300">Register</button>
        </form>
        <p class="text-center text-sm text-gray-600 mt-4">Already have an account? <a href="{{ route('login.dashboard') }}" class="text-purple-700 hover:underline">Log in</a></p>
    </div>
</body>

</html>