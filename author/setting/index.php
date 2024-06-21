<?php
include "../../config/function.php";
protected_session("author","../../login.php");
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
    <div class="flex flex-1 p-16 mt-12 gap-16">
        <div class="w-3/12">
            <div class="bg-orange-100 rounded w-full h-auto pb-10">
                <div class="p-10">
                    <img src="<?php
                    if(!$author['dp']==null)
                    {
                        echo "../../images/authors/".$author['dp'];
                    }
                    else{
                        echo "../../images/authors/default.png";
                    }
                    ?>" class="rounded-full" alt="">
                </div>
                <div class="flex flex-col px-10 items-center">
                    <h2 class="capitalize text-2xl font-semibold"><?=$author['author_name']?></h2>
                    <p class="text-slate-600 text-xs text-justify"><?=$author['author_email'];?></p>
                    <div class="flex gap-2">
                        <form  class="my-2 py-2" action="" method="post" enctype="multipart/form-data">
                            <label for="dp" href="" class="px-3 py-2 my-2 bg-blue-600 hover:bg-blue-800 text-white rounded">Change dp
                            <input type="file" onchange="this.form.submit()" name="dp" id="dp" hidden>
                            </label>
                        </form>
                        
                        <a href="" class="px-3 py-2 my-2 bg-teal-600 hover:bg-teal-800 text-white rounded">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-9/12 flex flex-col gap-5">
           <h2 class="text-3xl font-semibold">Edit Profile Here</h2>
           <div class="border bg-slate-100 shadow-md">
            <div class="p-4">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="text-lg font-semibold" for="">Fullname</label>
                        <input type="text" name="author_name" value="<?=$author['author_name']?>" class="border px-3 py-2 w-full">
                    </div>
                    <div class="mb-3">
                        <label class="text-lg font-semibold" for="">About Me</label>
                        <textarea type="text" rows="10" name="author_about" class="border resize-none px-3 py-2 w-full"><?=$author['author_about']?></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="bg-teal-600  px-3 py-2 text-white font-semibold rounded" value="Update profile">
                    </div>
                </form>
            </div>
           </div>
        </div>
    
    
</body>
</html>
<?php
//update profile code

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $author_name = $_POST['author_name'];
    $author_about= $_POST['author_about'];
    $author_id= $author['author_id'];

    $query="update authors set author_name = '$author_name',author_about='$author_about' where author_id = '$author_id'";
    $result = mysqli_query($con,$query);

    if($result)
    {
        redirect("../index.php");
    }
}
?>