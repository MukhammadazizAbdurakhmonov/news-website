<?php include dirname(__DIR__, 1).'/includes/header.php'; ?>

    <div class="container">
        <div class="row">
            
            <div class="col">
                <a href="<?php echo URLROOT;?>/category/index" class="btn btn-primary float-end">Back</a>

                <h1>Create category</h1>
                <form action="<?php echo URLROOT; ?>/category/create" class="needs-validation border p-2" method="post">
                    <div class="mb-3">
                        <label for="articleTitle" class="form-label">Category name</label>
                        <input name="category_name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Category name">
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<?php include dirname(__DIR__, 1).'/includes/footer.php'; ?>
