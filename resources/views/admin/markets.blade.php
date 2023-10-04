<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Markets</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/bg.avif');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="container mx-auto py-10">
        <h2 class="text-3xl font-bold mb-6 text-center text-blue-700">Stocks</h2>
        <div class="bg-white shadow-lg rounded-lg px-8 py-6">
            <div class="stock-line flex items-center justify-between bg-blue-100 px-4 py-2">
                <div class="w-1/3">
                    <h3 class="font-bold text-gray-800">Name</h3>
                </div>
                <div class="w-2/5">
                    <h3 class="font-bold text-gray-800">Current Purchase Price</h3>
                </div>
                <div class="w-1/3">
                    <h3 class="font-bold text-gray-800">Delete</h3>
                </div>
            </div>
            @foreach($stocks as $stock)
            <div class="stock-line flex items-center justify-between bg-white px-4 py-2">
                <div class="w-1/3">
                    <p class="text-gray-700">{{$stock['stock_name']}}</p>
                </div>
                <div class="w-2/5">
                    <p class="text-gray-700">{{$stock['current_purchaseprice']}}</p>
                </div>
                <div class="w-1/3">
                    <form action="/admindelete-stock/{{$stock->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="delete-btn bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach

            <div class="mt-4 text-center">
            <button onclick="window.location.href='{{ route('admin.dashboard') }}'" class="admin-btn bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Go Back</button>
            </div>
        </div>

    </div>
</body>
</html>