<?php include 'includes/header.php'; ?>

  <!-- News lists -->
  <div class="rounded-lg shadow-md bg-gray-50 px-4 py-2 mt-2">
      <div>
        <h1 class="font-semibold mb-2 text-3xl"><?php echo $data['article']->article_title; ?></h1>
        <p class="mb-4">
            <?php echo $data['article']->article_content; ?>
        </p>

        <span class="float-right"><i class="fa-sharp fa-solid fa-calendar-days"></i> <?php echo $data['article']->created_at; ?></span>
      </div>
    </div>
  <!-- News lists end -->
<?php include 'includes/footer.php'; ?>