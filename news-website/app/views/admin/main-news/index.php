<?php include dirname(__DIR__, 1).'/includes/header.php'; ?>

    <div class="container">
        <div class="row g-5">
        <?php include dirname(__DIR__, 1).'/includes/tables.php'; ?>

            <div class="col-md-10">
              <a href="<?php echo URLROOT; ?>/mainnews/create" class="btn btn-primary float-end mb-2">Create</a>
                <h1>Main News</h1>
                
                <table class="table caption-top table-bordered">
                  <caption>List of News</caption>
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">News Title</th>
                      <th scope="col">Category</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <!-- <div><img src="../public/images/Capture.JPG" alt="gg" style="width: 128px;"></div> -->
                  <tbody>
                  <?php foreach($data['news'] as $news): ?>
                    <tr>
                      <th scope="row"><?php echo $news->id; ?></th>
                      <td><?php echo $news->main_news_title; ?></td>
                      <td><?php echo $news->category_name; ?></td>
                      <td>
                        <form action="<?php echo URLROOT; ?>/mainnews/delete/<?php echo $news->id; ?>" class="d-inline" method="post">
                          <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                        <a href="<?php echo URLROOT; ?>/mainnews/edit/<?php echo $news->id; ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <a href="<?php echo URLROOT; ?>/mainnews/show/<?php echo $news->id; ?>" class="btn btn-sm btn-success"><i class="fa-solid fa-eye"></i> Show</a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include dirname(__DIR__, 1).'/includes/footer.php'; ?>