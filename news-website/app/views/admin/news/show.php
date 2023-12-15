<?php include dirname(__DIR__, 1).'/includes/header.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col">
            <a href="<?php echo URLROOT;?>/news/index" class="btn btn-primary float-end">Back</a>
              <table class="table caption-top table-bordered">
                    <tr>
                        <th class="col">News ID:</th>
                        <td><?php echo $data['news']->id; ?></td>
                    </tr>
                    <tr>
                        <th class="col">News title:</th>
                        <td><?php echo $data['news']->news_title; ?></td>
                    </tr>
                    <tr>
                        <th class="col">News content:</th>
                        <td><?php echo $data['news']->news_content; ?></td>
                    </tr>
                    <tr>
                        <th class="col">News category:</th>
                        <td><?php echo $data['news']->category_name; ?></td>
                    </tr>
                    <tr>
                        <th class="col">News image:</th>

                        <td><img src="<?php echo URLROOT; ?>/images/<?php echo $data['news']->news_image; ?>" style="width: 256px;"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

<?php include dirname(__DIR__, 1).'/includes/footer.php'; ?>