<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Markets</title>        
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/bginv.webp');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container mx-auto py-10">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-3xl font-bold mb-6 text-blue-700 text-center">Markets</h2>
            <div class="bg-blue-200 flex items-center py-2 px-4 font-bold text-blue-700">
                <div class="w-1/3">
                    <h3>Name</h3>
                </div>
                <div class="w-1/3">
                    <h3>Current Price</h3>
                </div>
                <div class="w-1/3">
                    <h3>Type</h3>
                </div>
                <div class="w-1/3">
                    <h3>Buy</h3>
                </div>
            </div>
            @foreach($stocks as $stock)
                <div class="bg-white flex items-center py-2 px-4 border-b border-gray-300">
                    <div class="w-1/3">
                        <p>{{$stock['stock_name']}}</p>
                    </div>
                    <div class="w-1/3">
                        <p>{{$stock['current_purchaseprice']}}</p>
                    </div>
                    <div class="w-1/3">
                        <p>{{$stock['type']}}</p>
                    </div>
                    <div class="w-1/3">
                        <form action="{{ route('buy-stock') }}" method="POST" class="flex items-center">
                            @csrf
                            <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                            <input type="number" name="quantity" placeholder="Quantity" required
                                class="mr-2 px-4 py-2 border rounded-lg">
                            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">Buy Stock</button>
                        </form>
                    </div>
                </div>
            @endforeach
        <div class="mt-4 text-center">
            <a href="{{ route('investor.dashboard') }}" class="text-blue-500 hover:text-blue-700">Go Back</a>
        </div>
        
        </div>
        
    </div>
</body>

</html>