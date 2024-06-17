<?php 
include_once "../config/function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert categories</title>
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
                <h2 class="text-2xl  font-semibold mb-3">Insert categories</h2>
                <a class="text-white bg-slate-500 rounded px-3 py-2" href="manage-categories.php">go back</a>
            </div>
            <form action="" method="post">
                <div class="mb-3 flex flex-col gap-2">
                    <label for="">Category title</label>
                    <input type="text" name="cat_title" class="border px-3 py-2 w-full">
                </div>
                <div class="mb-3 flex flex-col gap-2">
                    <label for="">Category description</label>
                    <textarea rows="6" type="text" name="cat_description" class="border px-3 py-2 w-full"></textarea>
                </div>
                <div class="mb-3 flex flex-col gap-2">
                    <input type="submit" name="submit" value="Insert category" class="bg-teal-600 rounded text-white px-3 py-2 ">
                </div>
            </form>
            <?php
            if(isset($_POST['submit']))
            {
                $record=[
                    "cat_title"=>$_POST['cat_title'],
                    "cat_slug"=>slugify($_POST['cat_slug']),
                    "cat_description"=>$_POST['cat_description'],
                ]; 
               
                if(insertData("categories",$record))
                {
                    redirect("manage-categories.php");
                }
                else
                {
                    message("something went wrong");
                }
            }
            ?>
           
        </div>
    </div>
    
</body>
</html>