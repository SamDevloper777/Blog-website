<h2 class="text-xl font-semibold  px-3 py-1 text-slate-700">categories</h2>
            <div class="flex mt-3 flex-col gap-3 ">
                <?php
                $callingCat = callingData("categories");
                foreach($callingCat as $cat):
                $cat_id = $cat['cat_id'];
                $countCat = countData("blog_posts"," category_id='$cat_id' and status='published'"); ?>

                <a class="text-lg capitalize w-[80%] bg-slate-100 px-3 py-2 rounded hover:bg-slate-800 hover:text-slate-100 transition-all duration-100 flex flex-1 justify-between" href="filter.php?cat=<?=$cat['cat_slug'];?> ">

                <span><?=$cat['cat_title'];?></span>
                <span class="text-slate-600"><?=($countCat>0) ? "($countCat)": null;?></span>
            </a>
            <?php endforeach; ?>
            </div>