<?php include 'includes/header.php'; ?>

    <!-- Main news, latest news, editors choice -->
    <div class="md:grid md:grid-cols-3">
      <div class="col-span-2">
        <!-- Main news -->
        <div class="grid grid-cols-1 m-2">
          <?php foreach($data['mainnews'] as $mainnews):?>
          <a href="<?php echo URLROOT; ?>/home/mainnews_show/<?php echo $mainnews->id; ?>" class="rounded-lg shadow-md bg-gray-50 p-2 hover:bg-gray-100">
            <img src="<?php echo 'images/'.$mainnews->main_news_image; ?>" class="object-cover md:w-full rounded-lg mb-2 md:h-96">
            <div>
              <h4 class="mb-2 italic underline"><?php echo $mainnews->category_name; ?></h4>
              <h1 class="font-semibold mb-2"><?php echo $mainnews->main_news_title; ?></h1>
              <p class="mb-2">
                <?php echo $mainnews->main_news_headline; ?>
              </p>
              <span class="float-right"><i class="fa-sharp fa-solid fa-calendar-days"></i> <?php echo $mainnews->created_at; ?></span>
            </div>
          </a>
          <?php endforeach; ?>
        </div>
        <!-- Main news End -->

        <!-- Latest news -->
        <div class="mx-2 border-b-2 pb-2 mb-4">
          <h1 class="font-semibold text-xl mb-2"><i class="fa-regular fa-circle"></i> Latest news</h1>
          <div class="grid grid-cols-1 gap-2 mb-2">
            
            <?php foreach($data['news'] as $news):?>
            <a href="<?php echo URLROOT; ?>/home/show/<?php echo $news->id; ?>" class="relative flex items-center rounded-lg shadow-md bg-gray-50 p-2 hover:bg-gray-100">
              <img src="<?php echo 'images/'.$news->news_image; ?>"  class=" h-32 w-48 object-fill rounded-lg mr-4">
              <div>
                <h4 class="top-2 italic underline"><?php echo $news->category_name; ?></h4>
                <h1 class="text-base font-semibold"><?php echo $news->news_title; ?></h1>
                <p>
                </p>
                <span class="float-right mt-2"><i class="fa-sharp fa-solid fa-calendar-days"></i> <?php echo $news->created_at; ?></span>
              </div>
            </a>
            <?php endforeach; ?>
          </div>
          <a href="<?php echo URLROOT; ?>/home/news" class="underline">Read more</a>
        </div>
        <!-- Latest news end -->

      </div>

      <!-- Articles choice -->
      <div class="mx-2 border-b-2 pb-2 mb-4">
        <h1 class="font-semibold text-xl mb-2 md:mt-2"><i class="fa-regular fa-circle"></i> Articles</h1>
        <div class="grid grid-cols-1 gap-2 font-semibold text-xl md:text-base mb-2">
          <?php foreach($data['articles'] as $article):?>
          <a href="<?php echo URLROOT; ?>/home/article/<?php echo $article->id; ?>" class="flex items-center rounded-lg shadow-md bg-gray-50 p-2 hover:bg-gray-100 hover:underline">
            <div class="md:text-lg">
              <p>
              <?php echo $article->article_title; ?>
              </p>
              <span class="float-right mt-2"><i class="fa-sharp fa-solid fa-calendar-days"></i> <?php echo $article->created_at; ?></span>
            </div>
          </a>
          <?php endforeach; ?>
        </div>
        <a href="<?php echo URLROOT; ?>/home/articles" class="underline">Read more</a>
      </div>
      <!-- Editors choice end -->
      
    </div>
    <!-- Main news, latest news, editors choice End -->
    
    <!-- World news -->
    <div class="mx-2 border-b-2 pb-2 mb-4">
      <h1 class="font-semibold text-xl mb-2"><i class="fa-regular fa-circle"></i> World news</h1>
      <div class="grid grid-cols-1 gap-2 md:grid-cols-2 gap-2 mb-2">
        <?php foreach($data['worldnews'] as $worldnews):?>
        <a href="#" class="flex items-center rounded-lg shadow-md bg-gray-50 p-2 hover:bg-gray-100">
          <img src="<?php echo 'images/'.$worldnews->news_image; ?>" class="h-32 object-cover rounded-lg mr-4">
          <div>
            <h2 class="italic underline"><?php echo $worldnews->category_name; ?></h2>
            <p>
              <?php echo $worldnews->news_title; ?>
            </p>
            <span class="float-right"><i class="fa-sharp fa-solid fa-calendar-days"></i><?php echo $worldnews->created_at; ?></span>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
      <a href="" class="underline">Read more</a>
    </div>
    <!-- World news End -->

    <!-- Sports -->
    <div class="m-2 border-b-2 pb-2 mb-4">
        <h1 class="font-semibold text-xl mb-2"><i class="fa-regular fa-circle"></i> Sports</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 mb-2">
          <?php foreach($data['sportnews'] as $sportnews): ?>
          <a href="#" class="rounded-lg shadow-md bg-gray-50 p-2 hover:bg-gray-100">
            <img src="<?php echo 'images/'.$sportnews->news_image; ?>" class="object-cover rounded-lg mr-4 h-64 w-full">
            <div>
              <h1 class="font-semibold text-xl text-center mb-2"><?php echo $sportnews->news_title; ?></h1>
              <span class="float-right"><i class="fa-sharp fa-solid fa-calendar-days"></i> <?php echo $sportnews->created_at; ?></span>
            </div>
          </a>
          <?php endforeach;?>
        </div>
        <a href="" class="underline">Read more</a>
    </div>
    <!-- Article End -->

<?php include 'includes/footer.php'; ?>