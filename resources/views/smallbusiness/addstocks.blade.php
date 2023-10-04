<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Stock</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/bwu.jpg');
            background-repeat: no-repeat;
            background-size: 130% 130%; 
        }
    </style>
</head>

<body class="bg-blue-200">
    <div class="container mx-auto py-10">
        <div class="bg-white shadow-lg rounded-lg px-8 py-6">
            <h2 class="text-3xl font-bold text-center mb-6 text-blue-700">Add a Stock</h2>
            <form action="/add-stock" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="stock_name" class="text-blue-700">Stock Name:</label>
                    <input type="text" name="stock_name" placeholder="Stock name" required
                        class="mt-2 px-4 py-2 border rounded-lg w-full">
                </div>
                <div class="mb-4">
                    <label for="current_purchaseprice" class="text-blue-700">Purchase Price:</label>
                    <input name="current_purchaseprice" type="number" placeholder="Enter price" required
                        class="mt-2 px-4 py-2 border rounded-lg w-full">
                </div>
                <div class="mb-4">
                    <label for="quantity" class="text-blue-700">Quantity:</label>
                    <input name="quantity" type="number" placeholder="Quantity amount" required
                        class="mt-2 px-4 py-2 border rounded-lg w-full">
                </div>
                <div class="mb-4">
                    <label for="type" class="text-blue-700">Type:</label>
                    <select name="type" required class="mt-2 px-4 py-2 border rounded-lg w-full">
                        <option value="">Select Type</option>
                        <option value="retail">Retail</option>
                        <option value="fashion">Fashion</option>
                        <option value="food&beverage">Food & Beverage</option>
                        <option value="technology">Technology</option>
                        <option value="media">Media</option>
                        <option value="craft">Craft</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Add Stock</button>
                </div>
            </form>
            <div class="mt-4 text-center">
                <a href="{{ route('smallbusiness.dashboard') }}"
                    class="text-blue-500 hover:text-blue-700">Go Back</a>
            </div>
        </div>
    </div>
</body>

</html>