<?php
include_once "config/function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register here</title>
</head>
<script src="https://cdn.tailwindcss.com"></script>
<body>
    <?php include_once "includes/header.php"; ?>
    
    <div class="flex flex-1 justify-center items-center h-[120vh]">
        <div class="w-4/12">
            <div class="bg-orange-50 border p-4 ">
                <div class="flex uppercase">
                    <h2 class="text-xl font-semibold my-3">SignUp As<span class="px-2 text-orange-600">Author</span></h2>
                </div>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" name="email" class="border px-3 py-2 rounded w-full" placeholder="e.g Rohan@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="">Password</label>
                        <input type="password" name="password" class="border px-3 py-2 rounded w-full" placeholder="******">
                    </div>
                    <div class="mb-3">
                       <input type="submit" name="login" class="px-3 py-2 bg-orange-600 text-white rounded w-full my-1 text-lg font-semibold" value="Login">
                    </div>
                </form>
                <div class="flex">
                    <a href="register.php"  class="text-orange-600">Create an account</a>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
<?php
if(isset($_POST['login']))
{ 
    $email=$_POST['email'];
    $password=sha1($_POST['password']);

    $count = countData('authors',"author_email='$email' and author_password='$password'");
    if($count > 0)
    {
       
        $_SESSION['author']= $email;
        redirect('author/index.php');

    }
    else{
        message("email and password incorrect");
    }
}
?>