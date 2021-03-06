<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="/own.css" rel="stylesheet">
</head>
<body>
 
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="/">Review Site</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/review">Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/home/about">About</a>
        </li>
        <?php if($_SESSION['authenticated'] == true): ?>
            <?php
            if ($_SESSION['auth_user']['type'] == 'admin'):?>
                <li class="nav-item navitem-right">
                    <a class="nav-link" href="/admin">Admin</a>
                </li>
            <?php endif;?>
            <li class="nav-item navitem-right">
                <a class="nav-link" href="/profile">Profile</a>
            </li>
            <li class="nav-item navitem-right">
                <a class="nav-link" href="/login/logout">Logout</a>
            </li>
        <?php else: ?>
            <li class="nav-item navitem-right">
                <a class="nav-link" href="/login">Login</a>
            </li>
        <?php endif; ?>
      </ul>     
    </div>
  </div>
</nav>

<div class="container">