<?php include dirname(__DIR__, 1).'/includes/header.php'; ?>

    <div class="container">
        <div class="row g-5">
        <?php include dirname(__DIR__, 1).'/includes/tables.php'; ?>
        
            <div class="col-md-10">
                <a href="<?php echo URLROOT; ?>/article/create" class="btn btn-primary float-end">Create</a>
                <h1>Articles</h1>
                
                <table class="table caption-top table-bordered">
                  <caption>List of Articles</caption>
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Article title</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($data['articles'] as $article): ?>
                    <tr>
                      <th scope="row"><?php echo $article->id; ?></th>
                      <td><?php echo $article->article_title; ?></td>
                      <td>
                        <form action="<?php echo URLROOT; ?>/article/delete/<?php echo $article->id; ?>" class="d-inline" method="post">
                          <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                        <a href="<?php echo URLROOT; ?>/article/edit/<?php echo $article->id; ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <a href="<?php echo URLROOT; ?>/article/show/<?php echo $article->id; ?>" class="btn btn-sm btn-success"><i class="fa-solid fa-eye"></i> Show</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include dirname(__DIR__, 1).'/includes/footer.php'; ?>
