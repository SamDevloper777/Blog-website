<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboardt</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php include_once "includes/adminheader.php" ?>
    <div class="flex flex-1">
        <div class="w-2/12">
            <?php include_once "includes/sidebar.php"?>
        </div>

        <div class="flex-1 bg-white">

            <div class="grid grid-cols-4 gap-5 p-4">
                <div class="border-2 rounded-lg shadow p-4 bg-red-100">
                    <h2 class="text-2xl font-semibold">30+</h2>
                    <h2 class="text-xl">Total categories</h2>
                </div>
                <div class="border-2 rounded-lg shadow p-4 bg-green-100">
                    <h2 class="text-2xl font-semibold">30+</h2>
                    <h2 class="text-xl">Total Author</h2>
                </div>
                <div class="border-2 rounded-lg shadow p-4 bg-purple-100">
                    <h2 class="text-2xl font-semibold">30+</h2>
                    <h2 class="text-xl">Total Post</h2>
                </div>
                <div class="border-2 rounded-lg shadow p-4 bg-blue-100">
                    <h2 class="text-2xl font-semibold">30+</h2>
                    <h2 class="text-xl">Total Tags</h2>
                </div>
                
            </div>
        </div>

    </div>
    
</body>
</html>