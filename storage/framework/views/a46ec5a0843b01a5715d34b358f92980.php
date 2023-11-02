<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Stock</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <style>

        .delete-btn:hover {
            background-color: #cc0000;
        }
    </style>
</head>

<body class="bg-blue-100">
    <div class="container mx-auto py-10">
        <div class="bg-white shadow-lg rounded-lg px-8 py-6">
            <h2 class="text-3xl font-bold mb-6 text-blue-700">My Stocks</h2>
            <div class="grid grid-cols-4 gap-4 bg-gray-200 py-2 px-4">
                <div>
                    <h3 class="text-lg font-semibold text-blue-800">Name</h3>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-blue-800">Current Price</h3>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-blue-800">Quantity</h3>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-blue-800">Actions</h3>
                </div>
            </div>
            <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="grid grid-cols-4 gap-4 bg-gray-100 py-2 px-4 mt-2">
                    <div>
                        <p class="text-gray-700"><?php echo e($stock['stock_name']); ?></p>
                    </div>
                    <div>
                        <p class="text-gray-700"><?php echo e($stock['current_purchaseprice']); ?></p>
                    </div>
                    <div>
                        <p class="text-gray-700"><?php echo e($stock['quantity']); ?></p>
                    </div>
                    <div>
                        <a href="/edit-stock/<?php echo e($stock->id); ?>"
                            class="text-white bg-blue-500 px-4 py-2 rounded-lg hover:bg-blue-600">Edit</a>
                        <form action="/delete-stock/<?php echo e($stock->id); ?>" method="POST" class="inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit"
                                class="text-white bg-red-500 px-4 py-2 rounded-lg hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="mt-4 text-center">
            <a href="<?php echo e(route('smallbusiness.dashboard')); ?>"
                class="text-blue-500 hover:text-blue-700">Go Back</a>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH C:\Users\user\Documents\GitHub\NewStock\resources\views/smallbusiness/viewstocks.blade.php ENDPATH**/ ?>