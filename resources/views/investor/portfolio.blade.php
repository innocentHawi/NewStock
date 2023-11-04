<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>  
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
            <h2 class="text-3xl font-bold mb-6 text-blue-700 text-center">My Stocks</h2>
            <div class="bg-blue-200 flex items-center py-2 px-4 font-bold text-blue-700">
                <div class="w-1/3">
                    <h3>Name</h3>
                </div>
                <div class="w-1/3">
                    <h3>Purchase Price</h3>
                </div>
                <div class="w-1/3">
                    <h3>Quantity</h3>
                </div>
                <div class="w-1/3">
                    <h3>Change</h3>
                </div>
                <div class="w-1/3">
                    <h3>Sell</h3>
                </div>
            </div>
            @foreach($portfolio as $portfolioItem)
                <div class="bg-white flex items-center py-2 px-4 border-b border-gray-300">
                    <div class="w-1/3">
                        <p>{{$portfolioItem['stock_name']}}</p>
                    </div>
                    <div class="w-1/3">
                        <p>{{$portfolioItem['purchase_price']}}</p>
                    </div>
                    <div class="w-1/3">
                        <p>{{$portfolioItem['quantity']}}</p>
                    </div>
                    <div class="w-1/3">
                        <p style="color: {{ $portfolioItem['profit_loss'] < 0 ? 'red' : 'green' }}">

                            @if ($portfolioItem['profit_loss'] < 0)
                                -{{ abs($portfolioItem['profit_loss']) }}
                            @else
                                +{{ $portfolioItem['profit_loss'] }}
                            @endif
                        </p>
                    </div>
                    <div class="w-1/3">
                        <form action="{{ route('sell-stock', $portfolioItem['stock_id']) }}" method="POST">
                            @csrf
                            <!-- Add any other form fields as needed -->
                            <input type="hidden" name="stock_id" value="{{ $portfolioItem['stock_id'] }}">
                            <input type="number" name="quantity" placeholder="Quantity" required
                                class="mr-2 px-4 py-2 border rounded-lg">
                            <button type="submit">Sell Stock</button>
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