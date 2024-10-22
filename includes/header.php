<?php

if(isset($_SESSION['author']))
{
    $session=$_SESSION['author'];
    $author = getUserInfo("authors","author_email='$session'");
}

?>
<header class="text-gray-600 body-font fixed bg-white top-0 w-full shadow-lg ">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
      <a href="index.php" class="mr-5 hover:text-gray-900">Home</a>
      <a class="mr-5 hover:text-gray-900">About</a>
      <a class="mr-5 hover:text-gray-900">term & condition</a>
    </nav>
    <a class="flex order-first lg:order-none lg:w-1/5 title-font font-medium items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-orange-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl">News 24x7</span>
    </a>
    <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
      <?php
      if(!isset($_SESSION['author'])):?>
      <a href="author/index.php" class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Submit your post
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
          <path d="M5 12h14M12 5l7 7-7 7"></path>
        </svg>
      </a>
      <?php elseif(isset($_SESSION['author'])):?>
  
<img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer" src="
<?php
if($author['dp']!=null)
{
  echo "images/authors/".$author['dp'];
}
else
{
  echo "images/authors/default.png";
}
?>

" alt="User dropdown">

<!-- Dropdown menu -->
<div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-white dark:divide-gray-600">
    <div class="px-4 py-3 text-sm text-gray-900 dark:text-black">
      <div><?=$author['author_name'];?></div>
      <div class="font-medium truncate"><?=$author['author_email'];?></div>
    </div>
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-900" aria-labelledby="avatarButton">
      <li>
        <a href="author/index.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
      </li>
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
      </li>
      <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
      </li>
    </ul>
    <div class="py-1">
      <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-900 dark:hover:bg-gray-600 dark:text-gray-900 dark:hover:text-white">Sign out</a>
    </div>
</div>




     <?php endif; ?>
    </div>
  </div>
</header>