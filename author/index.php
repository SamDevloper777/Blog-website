<?php
include "../config/function.php";
protected_session("author","../login.php");
$session=$_SESSION['author'];
$author = getUserInfo("authors","author_email='$session'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<script src="https://cdn.tailwindcss.com"></script>
<body>
    <?php include_once "includes/author_header.php"; ?>
    <?php include_once "includes/author_subheader.php"; ?>
    <div class="flex flex-1 p-16 mt-12 gap-16">
        <div class="w-3/12">
            <div class="bg-orange-100 rounded w-full h-auto pb-10">
                <div class="p-10">
                    <img src="https://picsum.photos/300/300" class="rounded-full" alt="">
                </div>
                <div class="flex flex-col px-10 items-center">
                    <h2 class="capitalize text-2xl font-semibold"><?=$author['author_name']?></h2>
                    <p class="text-slate-600 text-xs text-justify"><?=$author['author_email'];?></p>
                    <a href="" class="px-3 py-2 my-2 bg-teal-600 hover:bg-teal-800 text-white rounded">Edit Profile</a>
                </div>
            </div>
        </div>
        <div class="w-9/12 flex flex-col gap-5">
            <div class="flex flex-col gap-3">
                <h1 class="text-4xl text-slate-600">Hello,</h1>
                <h1 class="text-2xl text-slate-800 uppercase"><?=$author['author_name'];?></h1>
            </div>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius ut pariatur officiis, maxime ipsa quo illo cupiditate minus quasi, repellat consectetur magnam ab ipsam quas ex voluptatibus? Nobis sunt neque alias tenetur.
            </p>
            <a href="insert-post.php" class="px-3 py-2 bg-black text-xl rounded self-start text-white font-semibold">Start Posting</a>
        </div>

    </div>
    
    
</body>
</html>