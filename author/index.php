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
                    <img src="<?php
                    if(!$author['dp']==null)
                    {
                        echo "../images/authors/".$author['dp'];
                    }
                    else{
                        echo "../images/authors/default.png";
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
                        
                        <a href="setting/index.php" class="px-3 py-2 my-2 bg-teal-600 hover:bg-teal-800 text-white rounded">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-9/12 flex flex-col gap-5">
            <div class="flex flex-col gap-3">
                <h1 class="text-4xl text-slate-600">Hello,</h1>
                <h1 class="text-2xl text-slate-800 uppercase"><?=$author['author_name'];?></h1>
            </div>
            <p>
                <?php
                    if(!strlen($author['author_about']))
                    {
                        echo "<i>edit your profile write something about yourself</i>";
                    }
                    else
                    {
                        echo $author['author_about'];
                    }
                ?>
            </p>
            <a href="insert-post.php" class="px-3 py-2 bg-black text-xl rounded self-start text-white font-semibold">Start Posting</a>
        </div>

    </div>
    
    
</body>
</html>
<?php
//dp chaged

if(isset($_FILES['dp']['name']))
{
    $dp=$_FILES['dp']['name'];
    $tmp_dp=$_FILES['dp']['tmp_name'];
    move_uploaded_file($tmp_dp,"../images/authors/$dp");
    $author_id=$author['author_id'];

    $query=mysqli_query($con,"update authors set dp='$dp' where author_id='$author_id'");
    if($query)
    {
        redirect("index.php");
    }
}
?>