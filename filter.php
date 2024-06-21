<?php
include "config/function.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter</title>
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
            <?php include_once "includes/categories.php" ?>
        </div>
        <div class="w-9/12 flex flex-col mb-10 gap-3">
            <h2 class="text-2xl font-black text-slate-700 mb-3 border-b-2 capitalize"><?= (isset($_GET['cat'])) ? $_GET['cat'] : "Recent" ?> post</h2>
            <?php
            if (isset($_GET['cat'])) :
                $cat_slug = $_GET['cat'];
                $callingPost = callingData("blog_posts join authors on blog_posts.author_id= authors.author_id join categories on blog_posts.category_id = categories.cat_id where categories.cat_slug = '$cat_slug' and status='published'");
            else :
                $callingPost = callingData("blog_posts join authors on blog_posts.author_id= authors.author_id join categories on blog_posts.category_id = categories.cat_id where status='published'");
            endif;
            foreach ($callingPost as $post) :
            ?>
                <a href="view.php?post_slug=<?= $post['slug']; ?>">
                    <div class="flex flex-col gap-4">
                        <div class="border flex p-4 items-center gap-10">
                            <div class="flex-1">
                                <img class="object-cover h-[180px]" src="<?= 'images/posts/' . $post['feature_image']; ?>" alt="">
                            </div>
                            <div class="flex-[3]">
                                <div class="flex flex-col gap-2">
                                    <h1 class="text-2xl font-bold"><?= $post['title'] ?></h1>
                                    <div class="flex gap-8">
                                        <span class="flex items-center gap-1">
                                            <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-5 h-5 rounded-full cursor-pointer" src="
                                                <?php
                                                                if ($post['dp'] != null) {
                                                                    echo "images/authors/" . $post['dp'];
                                                                } else {
                                                                    echo "images/authors/default.png";
                                                                }
                                                ?>

                                                " alt="User dropdown">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                            </svg><?= $post['author_name'] ?>
                                        </span>

                                        <span class="flex items-center gap-1 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="gray" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                                            </svg><?= $post['cat_title'] ?>
                                        </span>
                                    </div>
                                    <p class="text-gray-500 line-clamp-3"><?= strip_tags($post['content']) ?></p>
                                </div>

                            </div>
                        </div>

                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>