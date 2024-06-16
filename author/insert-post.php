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
        <div class="flex items-center gap-2">
                <a href="posts/index.php" class="px-3 py-2 bg-green-800 text-white rounded">Go back</a>
                <h2 class="text-xl font-semibold">Insert page</h2>
         </div>
         <div class="border border-slate-400 p-4">
            <form action="" method="post" enctype="multipart/form-data">
                    <div class="grid grid-cols-2 p-2 gap-2">
                        <div class="mb-3">
                            <label class="lg" for="">Title</label>
                            <input type="text" name="title" class="border w-full px-3 py-2 rounded border-slate-300">
                        </div>
                        <div class="mb-3">
                            <label class="lg" for="">category</label>
                            <select type="text" name="category" class="border w-full px-3 py-2 rounded border-slate-300">
                                <option value="">Select category</option>
                                <?php
                                $categories=callingData("categories");
                                foreach($categories as $category){
                                    $cat_id=$category['cat_id'];
                                    $cat_title=$category['cat_title'];
                                    echo"<option value='$cat_id'>$cat_title</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-1">
                        <div class="mb-3 w-full">
                            <textarea name="content" class="border w-full px-3 py-2 rounded" placeholder="enter about your post" id=""></textarea>
                        </div>
                    </div>
                    <div class="flex flex-1">
                        <div class="mb-3 w-full">
                            <label for=""></label>
                            <input type="file" name="feature_image" class="border px-3 py-2 w-full">
                        </div>
                    </div>
                    <div class="flex flex-1">
                        <input type="submit" name="insert-post" class="bg-teal-600 text-white font-semibold hover:bg-teal-900 px-3 py-2 w-full">              
                    </div>

            </form>
            <?php
            if(isset($_POST['insert-post']))
            {
                //image upload work
                $temp=$_FILES['feature_image']['tmp_name'];
                $img_name=$_FILES['feature_image']['name'];
                move_uploaded_file($temp,"../images/posts/$img_name");
                $data=[
                    "title"=>$_POST['title'],
                    "slug"=>slugify($_POST['title']),
                    "category_id"=>$_POST['category'],
                    "author_id"=>$author['author_id'],
                    "content"=>addslashes($_POST['content']),
                    "feature_image"=>$img_name,
                ];
                if(insertData("blog_posts", $data))
                {
                    redirect("posts/index.php");
                }
                else
                {
                    message("something went wrong");
                }
            }
            ?>
         </div>
         
        </div>

    </div>

    <!-- Place the first <script> tag in your HTML's <head> -->
<!-- Place the first <script> tag in your HTML's <head> -->


<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script src="https://cdn.tiny.cloud/1/pvxf2rey6dhbd0zfoep9pxag4n66tqcoa74t54qq0aybqjbs/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
  });
</script>



</body>
</html>