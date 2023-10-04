<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Business Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    
</head>

<body class="bg-blue-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="container mx-auto py-10">
            
            <div class="bg-white shadow-lg rounded-lg px-8 py-6 mt-8">
                <h2 class="text-2xl font-bold text-blue-700 mb-4">Edit Information</h2>
                <form action="/edit-businessinformation" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-4">
                        <label for="business_name" class="text-blue-700">Business Name:</label>
                        <input type="text" name="business_name" placeholder="Business name" required
                            class="mt-2 px-4 py-2 border rounded-lg w-full">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="text-blue-700">Description:</label>
                        <textarea name="description" placeholder="Business description" required
                            class="mt-2 px-4 py-2 border rounded-lg w-full"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="address" class="text-blue-700">Address:</label>
                        <input type="text" name="address" placeholder="Address" required
                            class="mt-2 px-4 py-2 border rounded-lg w-full">
                    </div>
                    <div class="mb-4">
                        <label for="website" class="text-blue-700">Website:</label>
                        <input type="text" name="website" placeholder="Website" 
                            class="mt-2 px-4 py-2 border rounded-lg w-full">
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Save
                            Information</button>
                    </div>
                </form>

                <div class="mt-4 text-center">
                    <a href="<?php echo e(route('smallbusiness.dashboard')); ?>"
                        class="text-blue-500 hover:text-blue-700">Go Back</a>
                </div>
            </div>
            
        </div>
    </div>
</body>

</html><?php /**PATH C:\Users\HP\Desktop\StockBiz\resources\views/smallbusiness/businessinformation.blade.php ENDPATH**/ ?>