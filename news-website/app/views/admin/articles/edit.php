<?php include dirname(__DIR__, 1).'/includes/header.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <a href="<?php echo URLROOT; ?>/article/index" class="btn btn-primary float-end">Back</a>
                <h1>Update article</h1>
                <form action="<?php echo URLROOT; ?>/article/edit/<?php echo $data['article']->id; ?>" method="post" class="needs-validation border p-2">
                    <div class="mb-3">
                        <label for="articleTitle" class="form-label">Article title</label>
                        <input type="text" name="article_title" class="form-control" id="formGroupExampleInput" placeholder="Article title" value="<?php echo $data['article']->article_title; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="articleContent" class="form-label">Article content</label>
                        <textarea name="article_content" class="form-control" id="articleContent" placeholder="Article content"><?php echo $data['article']->article_content; ?></textarea>
                    </div>

                    <div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include dirname(__DIR__, 1).'/includes/footer.php'; ?>