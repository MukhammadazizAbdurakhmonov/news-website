<?php include dirname(__DIR__, 1).'/includes/header.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="<?php echo URLROOT;?>/news/index" class="btn btn-primary float-end">Back</a>
                <h1>Create main news</h1>
                <form action="<?php echo URLROOT;?>/mainnews/create" class="needs-validation border p-2" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="newsTitle" class="form-label">News title</label>
                        <input type="text" name="main_news_title" class="form-control" id="newsTitle" placeholder="News title">
                    </div>

                    <div class="mb-3">
                        <label for="newsContent" class="form-label">News headline</label>
                        <textarea class="form-control" name="main_news_headline" id="newsContent" placeholder="News headline"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="newsContent" class="form-label">News content</label>
                        <textarea class="form-control" name="main_news_content" id="newsContent" placeholder="News content"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="newsContent" class="form-label">News category</label>
                        <select class="form-select" aria-label="Default select example" name="category">
                          <option selected>Choose category</option>
                          <?php foreach($data['categories'] as $category): ?>
                            <option value="<?php echo $category->id; ?>"><?php echo $category->category_name; ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="newsImage" class="form-label">News image</label>
                        <input class="form-control" name="main_news_image" type="file" id="newsImage">
                    </div>

                    <div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include dirname(__DIR__, 1).'/includes/footer.php'; ?>