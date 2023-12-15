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
    <div class="mb-2">
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
          <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
              <a class="navbar-brand" href="#">Admin</a>
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav justify-content-end">
                <li class="nav-item d-flex">
                  <a class="nav-link active" aria-current="page" href="#"><?php echo $_SESSION['user_name']; ?></a>
                </li>
                <li class="nav-item d-flex">
                  <a class="nav-link active" href="<?php echo URLROOT;?>/auth/logout">LogOut</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    </div>
