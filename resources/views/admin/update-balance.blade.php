<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Balance</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-blue-100" style="background-image: url('/bg.avif'); background-repeat: no-repeat; background-size: cover;">
    <div class="container mx-auto py-10">
        <div class="bg-white shadow-lg rounded-lg px-8 py-6">
            <h2 class="text-3xl font-bold text-center mb-6 text-blue-700">Edit Balance</h2>
            <form action="/update-balance/{{$user->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="text-blue-700">Name:</label>
                    <input type="text" name="name" value="{{$user->name}}" disabled
                        class="mt-2 px-4 py-2 border rounded-lg w-full">
                </div>
                <div class="mb-4">
                    <label for="balance" class="text-blue-700">Balance:</label>
                    <input name="balance" type="number" value="{{$user->balance}}"
                        class="mt-2 px-4 py-2 border rounded-lg w-full">
                </div>
                <div class="mb-4">
                    <label for="role" class="text-blue-700">Role:</label>
                    <input name="role" type="text" value="{{$user->type}}" disabled
                        class="mt-2 px-4 py-2 border rounded-lg w-full">
                </div>
                <div class="text-center">
                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Save Changes</button>
                </div>
            </form>

            <div class="mt-4 text-center">
            <a href="{{ route('admin.dashboard') }}"
                class="text-blue-500 hover:text-blue-700">Admin Dashboard</a>
            </div>
        </div>
        
    </div>
</body>

</html>