<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-blue-100" style="background-image: url('/bg.avif'); background-repeat: no-repeat; background-size: cover;">
    <div class="container mx-auto py-10">
        <div class="bg-white shadow-lg rounded-lg px-8 py-6">
            <h2 class="text-3xl font-bold text-center mb-6 text-blue-700">Users</h2>
            <div class="flex flex-row bg-blue-200 py-2 px-4 font-bold text-blue-700">
                <div class="w-1/4">
                    <h3>Name</h3>
                </div>
                <div class="w-1/5">
                    <h3>Role</h3>
                </div>
                <div class="w-1/5">
                    <h3>Balance</h3>
                </div>
                <div class="w-1/6">
                    <h3>Edit</h3>
                </div>
                <div class="w-1/6">
                    <h3>Delete</h3>
                </div>
            </div>
            @foreach($users as $user)
            <div class="flex flex-row bg-white py-2 px-4 border-b border-gray-300">
                <div class="w-1/4">
                    <p>{{$user['name']}}</p>
                </div>
                <div class="w-1/5">
                    <p>{{$user['role']}}</p>
                </div>
                <div class="w-1/5">
                    <p>{{$user['balance']}}</p>
                </div>
                <div class="w-1/6">
                    <p><a href="/update-balance/{{$user->id}}" class="text-blue-500 hover:text-blue-700">Edit</a></p>
                </div>
                <div class="w-1/6">
                    <form action="/admindelete-user/{{$user->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-white bg-red-500 hover:bg-red-700 py-1 px-2 rounded">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach

            <div class="mt-4 text-center">
                <button onclick="window.location.href='{{ route('admin.dashboard') }}'" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Go Back</button>
            </div>
        </div>
    </div>
</body>

</html>