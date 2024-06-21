<?php
include "config/function.php";

//protect and redirect if without post slug visited
if (!isset($_GET['post_slug'])) {
    redirect("index.php");
}
//get post slug from url

$post_slug = $_GET['post_slug'];

//get post data from slug

$callingPost = callingData("blog_posts join categories on categories.cat_id=blog_posts.category_id join authors on authors.author_id=blog_posts.author_id", "slug='$post_slug' and status='published'")[0];

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
        <?php include_once "includes/categories.php"?>
        </div>
        <div class="w-9/12 flex flex-col mb-10 gap-3">
            <h2 class="text-2xl font-black text-slate-700 mb-3 border-b-2"><?= $callingPost['title']; ?></h2>

            <div class="flex gap-8">
                <span class="flex items-center gap-1">
                <img class="w-8 h-8 rounded-full" src="
                                        <?php
                                        if ($callingPost['dp'] != null) {
                                            echo "images/authors/".$callingPost['dp'];
                                        } else {
                                            echo "images/authors/default.png";
                                        }
                                        ?>

                                        " alt="Rounded avatar"><?= $callingPost['author_name'] ?>
                </span>

                <span class="flex items-center gap-1 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="gray" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                    </svg>
                    <a class="text-blue-700 underline" href="filter.php?cat=<?= $callingPost['cat_slug'] ?>"><?= $callingPost['cat_title'] ?></a>
                </span>
                <span class="flex items-center gap-1 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>

                                            </svg><?= date("D d-M-Y h:i A",strtotime($callingPost['date_of_created'])); ?>
                                        </span>
            </div>

            <p>
                <img src="<?= 'images/posts/' . $callingPost['feature_image']; ?>" class="object-fit w-[75%]" alt="">
                <?= $callingPost['content']; ?>
            </p>
                <!-- related posts -->
            <h2 class="text-2xl font-black text-slate-700 mb-3 border-b-2">Related post(4)</h2>
            <?php
            $callingPost=callingData("blog_posts join authors on blog_posts.author_id= authors.author_id join categories on blog_posts.category_id = categories.cat_id where status='published'");
            foreach($callingPost as $post):
            ?>
            <a href="view.php?post_slug=<?=$post['slug'];?>">
            <div class="flex flex-col gap-4">
                <div class="border flex p-4 items-center gap-10">
                    <div class="flex-1">
                        <img class="object-cover h-[180px]" src="<?='images/posts/'.$post['feature_image'];?>" alt="">
                    </div>
                    <div class="flex-[3]">
                        <div class="flex flex-col gap-2">
                            <h1 class="text-2xl font-bold"><?=$post['title']?></h1>
                            <div class="flex gap-8">
                            <img class="w-5 h-5 rounded-full" src="
                                        <?php
                                        if ($post['dp'] != null) {
                                            echo "images/authors/".$post['dp'];
                                        } else {
                                            echo "images/authors/default.png";
                                        }
                                        ?>

                                        " alt="Rounded avatar"><?=$post['author_name']?>
                                </span>

                                <span class="flex items-center gap-1 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="gray" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                                    </svg><?=$post['cat_title']?>
                                </span>
                                <span class="flex items-center gap-1 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>

                                            </svg><?= date("D d-M-Y h:i A",strtotime($post['date_of_created'])); ?>
                                        </span>
                            </div>
                            <p class="text-gray-500 line-clamp-3"><?=strip_tags($post['content'])?></p>
                        </div>

                    </div>
                </div>
                
            </div>
            </a>
            <?php endforeach;?>

        </div>
    </div>
</body>

</html>