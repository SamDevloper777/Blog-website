<?php include_once "../config/function.php"; 

protected_session("admin","../login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php include_once "includes/adminheader.php"  ?>
    <div class="flex flex-1  gap-2">
        <div class="w-2/12">
            <?php include_once "includes/sidebar.php"?>
        </div>
        <div class="flex-1 px-2 mt-3 bg-white">
            <div class="flex mt-2 px-3 justify-between items-center border-b pb-2">
                <h2 class="text-2xl  font-semibold mb-3">Manage categories</h2>
                <a class="text-white bg-green-500 rounded px-3 py-2" href="insert-categories.php ">Insert category</a>
            </div>
            <table class="table mt-3 w-full">
                <thead>
                    <tr>
                        <th class="p-2 border">Cat id</th>
                        <th class="p-2 border">Title</th>
                        <th class="p-2 border">Slug</th>
                        <th class="p-2 border">Description</th>
                        <th class="p-2 border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $calling = callingData("categories");
                        foreach($calling as $cat):
                    ?>
                    <tr>
                        <td class="p-2 border"><?=$cat['cat_id'];?></td>
                        <td class="p-2 border"><?=$cat['cat_title'];?></td>
                        <td class="p-2 border"><?=$cat['cat_slug'];?></td>
                        <td class="p-2 border"><?=$cat['cat_description'];?></td>
                        <td class="p-2 border"></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>