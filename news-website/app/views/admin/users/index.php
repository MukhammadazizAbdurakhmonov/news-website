<?php include dirname(__DIR__, 1).'/includes/header.php'; ?>

    <div class="container">
        <div class="row g-5">
        <?php include dirname(__DIR__, 1).'/includes/tables.php'; ?>
            <div class="col-md-10">
                <h1>Users</h1>
                <table class="table caption-top table-bordered">
                  <caption>List of Users</caption>
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">User name</th>
                      <th scope="col">User email</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data['users'] as $user): ?>
                      <tr>
                        <th scope="row"><?php echo $user->id; ?></th>
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td>
                          <div class="form-check">
                            <form action="<?php echo URLROOT; ?>/user/editor/<?php echo $user->id; ?>" method="post">
                                <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="editor" value="1" <?php echo ($user->editor == 1) ? "checked": 'unchecked'; ?> >
                                <label class="form-check-label" for="flexCheckDefault">
                                    Editor
                                </label>
                                <button class="btn btn-sm btn-primary">Save</button>
                            </form>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include dirname(__DIR__, 1).'/includes/footer.php'; ?>