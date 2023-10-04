<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/bgad.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body class="bg-gray-900">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="bg-gray-800 w-64">
            <!-- Navigation -->
            <nav class="text-gray-300 mt-20">
                <ul class="space-y-2">                
                    <!-- View and Edit Market -->
                    <li>
                        <a href="{{ route('admin.markets') }}" class="flex items-center px-6 py-3 hover:bg-gray-700">
                            <span class="mr-3">Markets</span>
                        </a>
                    </li>
                    <!-- Add Investor Balance -->
                    <li>
                        <a href="{{route('admin.users')}}" class="flex items-center px-6 py-3 hover:bg-gray-700">
                            <span class="mr-3">Manage Users</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex flex-col flex-1">
            <!-- Header -->
            <header class="bg-gray-800 py-4 px-6">
                <div class="flex items-center justify-between">
                    <h1 class="text-white text-2xl font-bold">Admin </h1>
                    <a href="{{ route('landpage.dashboard') }}" class="bg-white text-black px-4 py-2 rounded">Log Out</a>
                </div>
            </header>
           
        </div>
    </div>
</body>

</html>