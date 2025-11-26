<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Fixed credentials
  if ($username === "egift" && $password === "123") {
    // Redirect to admin panel
    header("Location: admin_panel_main.php");
    exit();
  } else {
    $error = "Invalid Username or Password!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/2d6e5e5e36.js" crossorigin="anonymous"></script>
  <style>
    body {
      background-color: #f3f4f6;
      font-family: "Poppins", sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      padding: 20px;
    }
    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 450px;
    }
    .header {
      background-color: #0d9488;
      color: white;
      padding: 20px;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      text-align: center;
    }
    .form-control {
      border: 2px solid #14b8a6;
      border-radius: 6px;
      padding: 12px;
      margin-bottom: 5px;
    }
    .form-control:focus {
      border-color: #0d9488;
      box-shadow: 0 0 0 0.2rem rgba(13,148,136,0.25);
    }
    .btn-teal {
      background-color: #0d9488;
      color: #fff;
      font-weight: 600;
      padding: 12px;
      border: none;
      border-radius: 6px;
      width: 100%;
      cursor: pointer;
      transition: 0.3s;
    }
    .btn-teal:hover {
      background-color: #0b7d72;
    }
    .error-text {
      font-size: 0.9rem;
      color: #dc3545;
      display: none;
      margin-top: 5px;
      margin-bottom: 10px;
    }
    input.error {
      border-color: #dc3545 !important;
    }
    input.valid {
      border-color: #28a745 !important;
    }
    .server-error {
      color: #dc3545;
      text-align: center;
      margin-top: 15px;
      font-size: 0.95rem;
    }
    label {
      font-weight: 500;
      margin-bottom: 8px;
      display: block;
      color: #374151;
    }
  </style>
</head>
<body>
  <div class="card">
    <div class="header">
      <h3 class="fw-bold mb-0"><i class="fa-solid fa-user-shield me-2"></i>Admin Login</h3>
    </div>
    <div class="card-body p-4">
      <form id="adminLoginForm" action="" method="post" novalidate>
        <div class="mb-3">
          <label>Username</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
          <div class="error-text" id="usernameError">Username is required.</div>
        </div>

        <div class="mb-3">
          <label>Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
          <div class="error-text" id="passwordError">Password is required.</div>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn-teal">Login</button>
        </div>
      </form>
      <?php if (!empty($error)) echo "<p class='server-error'>$error</p>"; ?>
    </div>
  </div>

  <script>
    document.getElementById('adminLoginForm').addEventListener('submit', function(e) {
      let valid = true;
      const form = e.target;
      const username = form.username;
      const password = form.password;

      // Reset validation
      [username, password].forEach(input => {
        input.classList.remove('error', 'valid');
        const errorDiv = document.getElementById(input.id + 'Error');
        errorDiv.style.display = 'none';
      });

      // Validate username
      if (username.value.trim() === '') {
        valid = false;
        username.classList.add('error');
        document.getElementById('usernameError').style.display = 'block';
      } else {
        username.classList.add('valid');
      }

      // Validate password
      if (password.value.trim() === '') {
        valid = false;
        password.classList.add('error');
        document.getElementById('passwordError').style.display = 'block';
      } else {
        password.classList.add('valid');
      }

      if (!valid) {
        e.preventDefault();
      }
    });
  </script>
</body>
</html>
