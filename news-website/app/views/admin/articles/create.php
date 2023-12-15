<?php include dirname(__DIR__, 1).'/includes/header.php'; ?>
    <div class="container">
        <div class="row g-5">
            
            <div class="col">
                <a href="index.html" class="btn btn-primary float-end">Back</a>

                <h1>Create article</h1>
                <form action="<?php echo URLROOT; ?>/article/create" method="post" class="needs-validation border p-2">
                    <div class="mb-3">
                        <label for="articleTitle" class="form-label">Article title</label>
                        <input type="text" name="article_title" class="form-control" id="formGroupExampleInput" placeholder="Article title">
                    </div>
                    <div class="mb-3">
                        <label for="articleContent" class="form-label">Article content</label>
                        <textarea class="form-control" name="article_content" id="articleContent" placeholder="Article content"></textarea>
                    </div>

                    <div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include dirname(__DIR__, 1).'/includes/footer.php'; ?>