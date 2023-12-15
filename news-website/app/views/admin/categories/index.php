<?php include dirname(__DIR__, 1).'/includes/header.php'; ?>

    <div class="container">
        <div class="row g-5">
        <?php include dirname(__DIR__, 1).'/includes/tables.php'; ?>
            <div class="col-md-10">
                <a href="<?php echo URLROOT; ?>/category/create" class="btn btn-primary float-end">Create</a>
                <h1>Categories</h1> 
                <table class="table caption-top table-bordered">
                  <caption>List of Categories</caption>
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Category name</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($data['categories'] as $category): ?>
                    <tr>
                      <th scope="row"><?php echo $category->id; ?></th>
                      <td><?php echo $category->category_name; ?></td>
                      <td>
                        <form action="<?php echo URLROOT; ?>/category/delete/<?php echo $category->id; ?>" class="d-inline" method="post">
                          <button class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                        <a href="<?php echo URLROOT; ?>/category/edit/<?php echo $category->id; ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include dirname(__DIR__, 1).'/includes/footer.php'; ?>