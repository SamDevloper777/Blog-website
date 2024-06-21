
<?php include_once "../config/function.php";

protected_session("admin","../login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Post</title>
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
                <h2 class="text-2xl  font-semibold mb-3">Manage Post(4)</h2>
                <a class="text-white bg-green-500 rounded px-3 py-2" href="insert-categories.php ">Insert category</a>
            </div>
            <table class="table mt-3 w-full">
                <thead>
                    <tr>
                        <th class="p-2 border">Id</th>
                        <th class="p-2 border">Title</th>
                        <th class="p-2 border">Slug</th>
                        <th class="p-2 border">Author</th>
                        <th class="p-2 border">Category</th>
                        <th class="p-2 border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $calling = callingData("blog_posts join categories on categories.cat_id=blog_posts.category_id join authors on authors.author_id=blog_posts.author_id");
                        foreach($calling as $post):
                    ?>
                    <tr>
                        <td class="p-2 border"><?=$post['id'];?></td>
                        <td class="p-2 border"><?=$post['title'];?></td>
                        <td class="p-2 border"><?=$post['slug'];?></td>
                        <td class="p-2 border"><?=$post['author_name'];?></td>
                        <td class="p-2 border"><?=$post['cat_title'];?></td>
                        <td class="p-2 border">
                            <?php
                            if($post['status']=='published')
                            {
                                echo"<span class='text-green-500'>published</span>";
                            }
                            elseif($post['status']=='draft')
                            {
                                 echo"<span class='text-red-500'>draft</span>";
                            }
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>