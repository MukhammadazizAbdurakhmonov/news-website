<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UzPress</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/eda2657632.js" crossorigin="anonymous"></script>
  </head>
  <body class="md:w-2/3 m-auto">

    <!-- Navbar -->
    <div class="shadow-md rounded">
      <div class="text-center font-semibold text-2xl border-b-2 py-2">
        <a href="<?php echo URLROOT;?>">UZPRESS</a>
      </div>
      <div>
        <ul class="flex justify-around flex-wrap font-semibold text-xl underline md:no-underline">
          <?php foreach($data['categories'] as $category): ?>
            <li class="m-2"><a href="<?php echo URLROOT;?>/home/category/<?php echo $category->category_name; ?>" class="md:hover:underline uppercase"><?php echo $category->category_name; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <!-- Navbar End -->