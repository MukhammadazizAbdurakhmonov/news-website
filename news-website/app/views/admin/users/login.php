<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/eda2657632.js" crossorigin="anonymous"></script>
  </head>
  <body>
</head>
<body>

    <div class="container col-md-6 mt-5">
        <h1 class="text-center">Login form</h1>
        <div class="row">
            <div class="col">
                <form action="<?php echo URLROOT; ?>/auth/login" class="needs-validation border p-2" method="post">
                    <div class="mb-3">
                        <label for="articleTitle" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="formGroupExampleInput" placeholder="Email" value="<?php echo empty($data['email']) ? '': $data['email']; ?>">
                        <div class="text-danger">
                            <?php echo !empty($data['errors']['email_error']) ? $data['errors']['email_error'] : '';?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="articleTitle" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="formGroupExampleInput" placeholder="Password" value="<?php echo empty($data['password']) ? '': $data['password']; ?>">
                        <div class="text-danger">
                            <?php echo !empty($data['errors']['password_error']) ? $data['errors']['password_error'] : '';?>
                        </div>
                    </div>

                    <div class="text-danger">
                        <?php echo !empty($data['errors']['credentials']) ? $data['errors']['credentials'] : '';?>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Include Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>