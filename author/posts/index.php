<?php
include "../../config/function.php";
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
    <?php include_once "../includes/author_header.php"; ?>
    <?php include_once "../includes/author_subheader.php"; ?>
    <div class="flex flex-1 p-16 mt-4 gap-16">
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
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold">Manage Post(6)</h2>
                <a href="" class="px-3 py-2 bg-green-700 text-white rounded">view post +</a>
            </div>

        <!-- all post table filter by logined author -->
         <table class="w-full">
            <thead>
                <tr>
                    <th class="border p-4">Id</th>
                    <th class="border p-4">Title</th>
                    <th class="border p-4">Date</th>
                    <th class="border p-4">Status</th>
                    <th class="border p-4">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $author_id =$author['author_id'];
                $callingPost = callingData("blog_posts","author_id='$author_id'");
                foreach($callingPost as $post):
                ?>
                <tr>
                    <td class="border p-4"><?=$post['id']?></td>
                    <td class="border p-4"><?=$post['title']?></td>
                    <td class="border p-4"><?=$post['date_of_created']?></td>
                    <td class="border p-4"><?=$post['status']?></td>
                    <td class="border p-4">
                        <?php
                          if($post['status']=="draft"):
                        ?>
                        <a href="?isPublish=1 & post_id=<?=$post['id'];?>" class="bg-green-600 text-white px-2 py-1">Publish</a>

                        <?php else: ?>

                        <a href="?isPublish=0 & post_id=<?=$post['id'];?>" class="bg-red-600 text-white px-2 py-1">UnPublish</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
         </table>
       </div>
    </div>
    
    
</body>
</html>
<?php
if(isset($_GET['isPublish']))
{  
    $post_id=$_GET['post_id'];
   
    if($_GET['isPublish']==1)
    {
        $currentStatus = 'published'; 
    }
    elseif($_GET['isPublish']== 0)
    {
        $currentStatus = 'draft';
    }
    $queryforupdate=mysqli_query($con,"update blog_posts SET status='$currentStatus' where id='$post_id'"); 
   
    if($queryforupdate)
    {
        redirect("index.php");
    }
    else
    {
        message("something went wrong"); 
    }
  
    
    
}
?>