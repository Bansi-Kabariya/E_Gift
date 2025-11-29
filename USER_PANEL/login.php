<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/2d6e5e5e36.js" crossorigin="anonymous"></script>

  <?php include 'header.php'; ?>

<?php
include 'connection.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Fetch user from database
    $stmt = $con->prepare("SELECT u_email, u_pass FROM user WHERE u_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($db_email, $db_pass);
        $stmt->fetch();

        // ❗ Since your password is NOT hashed, use direct comparison
        if ($password === $db_pass) {

            $_SESSION['user_email'] = $db_email;

            echo "<script>
                    alert('Login Successful');
                    window.location.href = 'index.php';
                  </script>";
            exit;
        } else {
            echo "<script>alert('Invalid Email or Password');</script>";
        }

    } else {
        echo "<script>alert('Invalid Email or Password');</script>";
    }

    $stmt->close();
}
?>

  <style>
    body {
      margin-top: 100px;
      background-color: #f3f4f6;
      font-family: "Poppins", sans-serif;
    }
    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .header {
      background-color: #018748ff;
      color: white;
      padding: 15px;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
    }
    .form-control {
      border: 2px solid #018748ff;
      border-radius: 6px;
    }
    .form-control:focus {
      border-color: #018748ff;
      box-shadow: 0 0 0 0.2rem rgba(13,148,136,0.25);
    }
    .btn-teal {
      background-color: #018748ff;
      color: #fff;
      font-weight: 600;
    }
    .btn-teal:hover {
      background-color: #006241;
    }
    .error-text {
      font-size: 0.9rem;
      color: red;
      display: none;
    }
    input.error {
      border-color: red !important;
    }
    input.valid {
      border-color: green !important;
    }
  </style>
</head>
<body>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
      <div class="card">
        <div class="header text-center">
          <h3 class="fw-bold mb-0"><i class="fa-solid fa-right-to-bracket me-2"></i>Login</h3>
        </div>
        <div class="card-body p-4">
          <form id="loginForm" method="POST" novalidate>
            <div class="mb-3">
              <label>Email</label>
              <input type="email" class="form-control" name="email" placeholder="Enter email">
              <div class="error-text">Please enter a valid email.</div>
            </div>

            <div class="mb-3">
              <label>Password</label>
              <input type="password" class="form-control" name="password" placeholder="Enter password">
              <div class="error-text">Password is required.</div>
            </div>

            <div class="d-grid mb-3">
              <button type="submit" class="btn btn-teal">Login</button>
            </div>

            <div class="text-center">
              <p><a href="#" class="fw-semibold" style="color:#0d9488;">Forgot Password?</a></p>
              <p>Don't have an account? 
                <a href="Registration.php" class="fw-semibold" style="color:#0d9488;">Register Now</a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.getElementById('loginForm').addEventListener('submit', function(e) {
  e.preventDefault();
  let valid = true;

  const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  const form = e.target;

  const email = form.email;
  const password = form.password;

  [email, password].forEach(input => {
    input.classList.remove('error', 'valid');
    const error = input.nextElementSibling;
    if (input.value.trim() === '') {
      valid = false;
      input.classList.add('error');
      error.style.display = 'block';
    } else if (input.name === 'email' && !emailPattern.test(input.value)) {
      valid = false;
      input.classList.add('error');
      error.innerText = "Enter a valid email address.";
      error.style.display = 'block';
    } else {
      input.classList.add('valid');
      error.style.display = 'none';
    }
  });

  if (valid) {
    this.submit();   // send form to PHP
  }
});
</script>

</body>
</html>

<?php include 'footer.php'; ?>