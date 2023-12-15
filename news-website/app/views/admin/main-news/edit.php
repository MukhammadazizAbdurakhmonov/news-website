<?php include dirname(__DIR__, 1).'/includes/header.php'; ?>

  <div class="container">
      <div class="row">
          <div class="col-md-10">
              <a href="<?php echo URLROOT;?>/mainnews/index" class="btn btn-primary float-end">Back</a>
              <h1>Update news</h1>

              <form class="needs-validation border p-2" method="post" enctype="multipart/form-data">
                
                <!-- News title -->
                <div class="mb-3">
                    <label for="newsTitle" class="form-label">News title</label>
                    <input type="text" class="form-control" name="main_news_title" id="newsTitle" value="<?php echo $data['news']->main_news_title; ?>">
                </div>

                <!-- News content -->
                <div class="mb-3">
                    <label for="newsContent" class="form-label">News content</label>
                    <textarea class="form-control" name="main_news_content" id="newsContent"><?php echo $data['news']->main_news_content; ?></textarea>
                </div>

                <!-- News category -->
                <div class="mb-3">
                    <label for="newsContent" class="form-label">News category</label>
                    <select class="form-select" aria-label="Default select example" name="category">
                    
                        <?php foreach($data['categories'] as $category): ?>
                            <option value="<?php echo $category->id; ?>" <?php echo ($category->id == $data['news']->category_id) ? "selected" : ''; ?> > <?php echo $category->category_name; ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- News image -->
                <div><img src="<?php echo URLROOT; ?>/images/<?php echo $data['news']->main_news_image; ?>" style="width: 256px;"></div>
                
                <!-- News image upload -->
                <div class="mb-3">
                    <label for="newsImage" class="form-label">News image</label>
                    <input class="form-control" name="main_news_image" type="file" id="newsImage">
                </div>

                <!-- Submit button -->
                <div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>

              </form>
          </div>
      </div>
  </div>

<?php include dirname(__DIR__, 1).'/includes/footer.php'; ?>