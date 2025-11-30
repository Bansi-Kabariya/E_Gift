<!DOCTYPE html>
<html lang="en">
<head>
<<<<<<< HEAD
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Eco-Friendly Gift - Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #f0fdf4; /* Light green background */
        }
        .login-form {
            max-width: 400px;
            margin: 60px auto;
            padding: 25px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        .success-message {
            display: none;
        }
    </style>
=======
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
>>>>>>> 65d0f0fe804f9e820f74054ed5a86559f5d1ff22
</head>
<body>

<!-- Login Form -->
<div class="login-form">
    <h3 class="text-center mb-4">User Login</h3>

    <!-- Success message
    <div class="alert alert-success success-message" id="successMessage">
        Login successful!
    </div> -->

    <form id="loginForm" action="index.php" method="POST" novalidate onsubmit="alert('Login successful!')">
        <!-- Email Field -->
        <div class="mb-3">
            <label for="email" class="form-label">Email Address *</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" />
            <div class="error" id="emailError"></div>
        </div>
<<<<<<< HEAD
=======
        <div class="card-body p-4">
          <form id="loginForm" method="POST" novalidate>
            <div class="mb-3">
              <label>Email</label>
              <input type="email" class="form-control" name="email" placeholder="Enter email">
              <div class="error-text">Please enter a valid email.</div>
            </div>
>>>>>>> 65d0f0fe804f9e820f74054ed5a86559f5d1ff22

        <!-- Password Field -->
        <div class="mb-3">
            <label for="password" class="form-label">Password *</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" />
            <div class="error" id="passwordError"></div>
        </div>

        <!-- Submit Button -->
        <a href="index.php">
        <button type="submit" class="btn btn-success w-100">Login</button>
        </a>
    </form>
</div>

<script>


$(document).ready(function() {
    $("#loginForm").submit(function(e) {
        let isValid = true;

        // Clear all previous errors and hide success message
        $(".error").text("");
        $("#successMessage").hide();

<<<<<<< HEAD
        const email = $("#email").val().trim();
        const password = $("#password").val();

        // Validate Email
        if (email === "") {
            $("#emailError").text("Please enter your email.");
            isValid = false;
        } else {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                $("#emailError").text("Please enter a valid email address.");
                isValid = false;
            }
        }

        // Validate Password
        if (password === "") {
            $("#passwordError").text("Please enter your password.");
            isValid = false;
        }

        // If valid, show success message and prevent actual submission (for demo)
        if (isValid) {
            e.preventDefault(); // Prevent actual submission
            $("#successMessage").show(); // Show success alert
            // Optionally, you can submit the form here if connected to the backend
            // this.submit();
        } else {
            e.preventDefault(); // Prevent submission if there are errors
        }
    });
=======
  if (valid) {
    this.submit();   // send form to PHP
  }
>>>>>>> 65d0f0fe804f9e820f74054ed5a86559f5d1ff22
});
</script>

</body>
</html>
<<<<<<< HEAD
=======

<?php include 'footer.php'; ?>
>>>>>>> 65d0f0fe804f9e820f74054ed5a86559f5d1ff22
