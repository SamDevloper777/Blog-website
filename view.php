<?php
include "config/function.php";

//protect and redirect if without post slug visited
if(!isset($_GET['post_slug']))
{
    redirect("index.php");
}
//get post slug from url

$post_slug =$_GET['post_slug'];

//get post data from slug

$callingPost = callingData("blog_posts join categories on categories.cat_id=blog_posts.category_id join authors on authors.author_id=blog_posts.author_id","slug='$post_slug'")[0];

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
    <?php include_once "includes/header.php"; ?>
<br>
<br>
<br>
<br>
<br>
    
    <div class="flex flex-1 px-[6%] gap-3">
        <div class="w-3/12">
            <h2 class="text-xl font-semibold  px-3 py-1 text-slate-700">categories</h2>
            <div class="flex mt-3 flex-col gap-3 ">
                <?php
                $callingCat = callingData("categories");
                foreach($callingCat as $cat):
                $cat_id = $cat['cat_id'];
                $countCat = countData("blog_posts","category_id='$cat_id'");?>

                <a class="text-lg capitalize w-[80%] bg-slate-100 px-3 py-2 rounded hover:bg-slate-800 hover:text-slate-100 transition-all duration-100 flex flex-1 justify-between" href="filter.php?cat=<?=$cat['cat_slug'];?> ">

                <span><?=$cat['cat_title'];?></span>
                <span class="text-slate-600"><?=($countCat>0) ? "($countCat)": null;?></span>
            </a>
            <?php endforeach; ?>
            </div>
        </div>
        <div class="w-9/12 flex flex-col mb-10 gap-3">
            <h2 class="text-2xl font-black text-slate-700 mb-3 border-b-2"><?=$callingPost['title'];?></h2>

            <div class="flex gap-8">
                                <span class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="grey" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg><?=$callingPost['author_name']?>
                                </span>

                                <span class="flex items-center gap-1 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="gray" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                                    </svg>
                                    <a class="text-blue-700 underline" href="filter.php?cat=<?=$callingPost['$cat_slug'];?>"
                                    ><?=$callingPost['cat_title']?></a>
                                </span>
                    </div>

            <p>
                <img src="<?= 'images/posts/'.$callingPost['feature_image'];?>" class="object-fit w-[75%]" alt="">
                <?=$callingPost['content'];?>
            </p>
            
        </div>
    </div>
</body>
</html>