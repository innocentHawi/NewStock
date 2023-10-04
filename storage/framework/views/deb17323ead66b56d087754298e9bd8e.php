<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900" style="background-image: url(/bgu.jpg); background-size: cover;">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="bg-gray-800 w-64">
            <!-- Navigation -->
            <nav class="text-gray-300 mt-20">
                <ul class="space-y-2">

                    <!-- Listed Businesses -->
                    <li>
                        <a href="<?php echo e(route('investor.markets')); ?>" class="flex items-center px-6 py-3 hover:bg-gray-700">
                            <span class="mr-3">Markets</span>
                        </a>
                    </li>

                    <!-- Portfolio -->
                    <li>
                        <a href="<?php echo e(route('investor.portfolio')); ?>" class="flex items-center px-6 py-3 hover:bg-gray-700">
                            <span class="mr-3">Portfolio</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex flex-col flex-1">
            <!-- Header -->
            <header class="bg-gray-800 py-6 px-6">
                <div class="flex items-center justify-between">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h1 class="text-white text-2xl font-bold"><?php echo e($user['name']); ?></h1>
                    <a href="<?php echo e(route('landpage.dashboard')); ?>" class="bg-white text-black px-4 py-2 rounded">Log Out</a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </header>
            <div class="flex flex-col flex-1">
                <!-- Page Content -->
                <main class="p-6">
        
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white rounded-lg p-4 flex items-center w-1/4">
                        <div class="ml-3">
                            <h3 class="text-lg font-semibold text-gray-800">Balance: <?php echo e($user['balance']); ?></h3>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </main>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH C:\Users\HP\Desktop\StockBiz\resources\views/investor/dashboard.blade.php ENDPATH**/ ?>