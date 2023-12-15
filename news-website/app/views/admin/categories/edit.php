<?php include dirname(__DIR__, 1).'/includes/header.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <a href="<?php echo URLROOT; ?>/categories/index" class="btn btn-primary float-end">Back</a>
                <h1>Update category</h1>
                <form action="<?php echo URLROOT; ?>/category/edit/<?php echo $data['category']->id; ?>" class="needs-validation border p-2" method="post">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category name</label>
                        <input name="category_name" type="text" class="form-control" id="categoryName" placeholder="Category name" value="<?php echo $data['category']->category_name; ?>">
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include dirname(__DIR__, 1).'/includes/footer.php'; ?>