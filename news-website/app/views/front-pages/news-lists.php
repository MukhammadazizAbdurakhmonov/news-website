<?php include 'includes/header.php'; ?>

  <!-- News lists -->
  <div class="mx-2 border-b-2 pb-2 mb-4 mt-4">
    <h1 class="font-semibold text-xl mb-2"><i class="fa-regular fa-circle"></i> <?php echo basename($_GET['url']); ?></h1>
    <div class="grid grid-cols-1 gap-2 mb-2">
      <?php foreach($data['news'] as $news): ?>
        <a href="<?php echo URLROOT; ?>/home/show/<?php echo $news->id; ?>" class="flex items-center rounded-lg shadow-md bg-gray-50 p-2 hover:bg-gray-100">
          <img src="<?php echo URLROOT; ?>/images/<?php echo $news->news_image; ?>" class="h-32 object-cover rounded-lg mr-4">
          <div>
            <h4 class="italic underline"><?php echo $news->category_name; ?></h4>
            <h1 class="text-base font-semibold"><?php echo $news->news_title; ?></h1>
            <span class="float-right mt-2"><i class="fa-sharp fa-solid fa-calendar-days"></i> <?php echo $news->created_at; ?></span>
          </div>
        </a>
      <?php endforeach; ?>
      
    <div class="text-center flex justify-around">

      <div>
        <?php if($data['paginator']->previous): ?>
          <a href="?page=<?php echo $data['paginator']->previous;?>"><i class="fa-solid fa-arrow-left underline"></i></a>
        <?php else:?>
          <i class="fa-solid fa-arrow-left underline"></i>
        <?php endif; ?>
      </div>
      
      <div>
        <?php if($data['paginator']->next): ?>
          <a href="?page=<?php echo $data['paginator']->next;?>"><i class="fa-solid fa-arrow-right underline"></i></a>
        <?php else:?>
          <i class="fa-solid fa-arrow-right underline"></i>
        <?php endif; ?>
      </div>
      
    </div>
    </div>
  </div>

  <!-- News lists end -->
<?php include 'includes/footer.php'; ?>