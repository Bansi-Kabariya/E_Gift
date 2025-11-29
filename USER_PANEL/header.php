<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
      header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
      }
  </style>
</head>
<body>
<header>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">

      <div class="logo"> 
        <img src="img/logo.png" alt="Site Logo" height="80">
      </div>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cat.php">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contactus.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">Cart</a>
          </li>
        </ul>

        <form class="d-flex">
          <input class="form-control me-2" type="text" placeholder="Search">
          <button class="btn btn-success me-2" type="button">Search</button>

          <li class="nav-item">

            <?php if (isset($_SESSION['user_email'])): ?>
                <!-- User is logged in → Logout button -->
                <a href="logout.php" class="btn btn-danger">Logout</a>
            <?php else: ?>
                <!-- User NOT logged in → Login button -->
                <a href="login.php" class="btn btn-success">Login</a>
            <?php endif; ?>

          </li>
        </form>
      </div>

    </div>
  </nav>
</header>

<div class="container-fluid mt-3"></div>
</body>
</html>
