<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Small Business</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet"><!--new-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .header {
            background-color: #1a202c;
        }

        .header .logo {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
        }

        .header .logout {
            color: #000;
            background-color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        body {
            background-image: url('/bgu.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .main-content {
            margin-top: 64px;
        }
    </style>
</head>

<body class="bg-gray-900">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="bg-gray-800 w-64">
            <!-- Navigation -->
            <nav class="text-gray-300 pt-16">
                <ul class="space-y-2">
                    <!-- Business Information -->
                    <li>
                        <a href="{{ route('smallbusiness.businessinformation') }}" class="flex items-center px-6 py-3 hover:bg-gray-700">
                            <span class="mr-3">Business Information</span>
                        </a>
                    </li>
                    <!-- View Stocks -->
                    <li>
                        <a href="{{ route('smallbusiness.viewstocks') }}" class="flex items-center px-6 py-3 hover:bg-gray-700">
                            <span class="mr-3">View Stocks</span>
                        </a>
                    </li>
                    <!-- Add Stocks -->
                    <li>
                        <a href="{{ route('smallbusiness.addstocks') }}" class="flex items-center px-6 py-3 hover:bg-gray-700">
                            <span class="mr-3">Add Stocks</span>
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
                @foreach($users as $user)
                    <h1 class="text-white text-2xl font-bold">{{$user['name']}}</h1>
                    <h1 class="text-white text-2xl font-bold">Balance: {{$user['balance']}}</h1>
                    <a href="{{ route('landpage.dashboard') }}" class="bg-white text-black px-4 py-2 rounded">Log Out</a>
                @endforeach
                </div>
            </header>



            <!-- Page Content -->
            <main class="p-6 flex-grow main-content">
                @foreach($businessinfos as $businessinfo)
                <div class="bg-white rounded-lg p-4 flex items-center w-1/2">
                    <div class="mb-4">
                        <p class="text-lg font-semibold text-gray-800">About: {{$businessinfo['description']}}</p>
                        <p class="text-lg font-semibold text-gray-800">Address: {{$businessinfo['address']}}</p>
                        <p class="text-lg font-semibold text-gray-800">Website: {{$businessinfo['website']}}</p>
                    </div>
                </div>
                @endforeach
            </main>
        </div>
    </div>
</body>

</html>