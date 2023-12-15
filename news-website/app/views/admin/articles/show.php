<?php include dirname(__DIR__, 1).'/includes/header.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col">
            <a href="<?php echo URLROOT;?>/article/index" class="btn btn-primary float-end">Back</a>
              <table class="table caption-top table-bordered">
                    <tr>
                        <th class="col">Article ID:</th>
                        <td><?php echo $data['article']->id; ?></td>
                    </tr>
                    <tr>
                        <th class="col">Article title:</th>
                        <td><?php echo $data['article']->article_title; ?></td>
                    </tr>
                    <tr>
                        <th class="col">Article content:</th>
                        <td><?php echo $data['article']->article_content; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

<?php include dirname(__DIR__, 1).'/includes/footer.php'; ?>