<?php
include "../config/function.php";

protected_session("admin","../login.php");

$countcategory=countData("categories");
$countpost=countData("blog_posts");
$countauthor=countData("authors");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php include_once "includes/adminheader.php" ?>
    <div class="flex flex-1">
        <div class="w-2/12">
            <?php include_once "includes/sidebar.php"?>
        </div>

        <div class="flex-1 bg-white">

            <div class="grid grid-cols-3 gap-5 p-4">
                <div class="border-2 rounded-lg shadow p-4 bg-red-100">
                    <h2 class="text-2xl font-semibold"><?=$countcategory ?></h2>
                    <h2 class="text-xl">Total categories</h2>
                </div>
                <div class="border-2 rounded-lg shadow p-4 bg-green-100">
                    <h2 class="text-2xl font-semibold"><?=$countauthor?></h2>
                    <h2 class="text-xl">Total Author</h2>
                </div>
                <div class="border-2 rounded-lg shadow p-4 bg-purple-100">
                    <h2 class="text-2xl font-semibold"><?= $countpost?></h2>
                    <h2 class="text-xl">Total Post</h2>
                </div>
                
            </div>
        </div>

    </div>
    
</body>
</html>