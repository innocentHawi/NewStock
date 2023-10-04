<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Stock</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <style>

        .form-container a {
            color: blue;
            text-decoration: none;
        }
    </style>
</head>
<body class="bg-blue-100">
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white border-2 border-black rounded-lg py-6 px-8">
            <h1 class="text-3xl font-bold text-blue-700 mb-6">Edit Stock</h1>
            <form action="/edit-stock/<?php echo e($stock->id); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <label for="stock_name" class="mb-2 text-gray-700">Stock Name</label>
                <input type="text" name="stock_name" value="<?php echo e($stock->stock_name); ?>" disabled
                    class="w-full px-4 py-2 border rounded-lg mb-4">
                <label for="current_purchaseprice" class="mb-2 text-gray-700">Current Purchase Price</label>
                <input name="current_purchaseprice" type="number" value="<?php echo e($stock->current_purchaseprice); ?>"
                    class="w-full px-4 py-2 border rounded-lg mb-4">
                <label for="quantity" class="mb-2 text-gray-700">Quantity</label>
                <input name="quantity" type="number" value="<?php echo e($stock->quantity); ?>"
                    class="w-full px-4 py-2 border rounded-lg mb-4">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Save
                    Changes</button>
            </form>
            <div class="flex justify-center mt-4">
                <a href="<?php echo e(route('smallbusiness.dashboard')); ?>" class="text-blue-500 hover:text-blue-700">Small
                    Business Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\HP\Desktop\StockBiz\resources\views/smallbusiness/edit-stock.blade.php ENDPATH**/ ?>