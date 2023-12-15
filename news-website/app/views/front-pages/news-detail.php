<?php include 'includes/header.php'; ?>

  <!-- News lists -->
  <div class="rounded-lg shadow-md bg-gray-50 px-4 py-2 mt-2">
      <img src="<?php echo URLROOT; ?>/images/<?php echo $data['news']->news_image; ?>" class="object-cover md:w-full rounded-lg mb-2 md:h-96">
      <div>
        <h4 class="mb-2 italic underline"><?php echo $data['news']->category_name; ?></h4>
        <h1 class="font-semibold mb-2"><?php echo $data['news']->news_title; ?></h1>
        <p class="mb-4">
            <?php echo $data['news']->news_content; ?>
        </p>

        <span class="float-right"><i class="fa-sharp fa-solid fa-calendar-days"></i> <?php echo $data['news']->created_at; ?></span>
        <div><?php echo $data['news']->name; ?></div>
      </div>
    </div>
  <!-- News lists end -->
<?php include 'includes/footer.php'; ?>