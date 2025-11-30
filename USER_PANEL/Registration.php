<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Eco-Friendly Gift - Registration</title>
    <!-- Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- jQuery for validation -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #f0fdf4; /* Light green background */
        }
        .registration-form {
            max-width: 500px;
            margin: 50px auto;
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
</head>
<body>

<<<<<<< HEAD
<!-- Registration Form -->
<div class="registration-form">
    <h3 class="text-center mb-4">Create Account</h3>
=======
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card">
        <div class="header text-center">
          <h3 class="fw-bold mb-0"><i class="fa-solid fa-user-plus me-2"></i>Register</h3>
        </div>
        <div class="card-body p-4">
          <form id="registerForm" method="POST" novalidate>
            <div class="row g-4">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label>Full Name</label>
                  <input type="text" class="form-control" name="fname" placeholder="Enter full name">
                  <div class="error-text">This field is required.</div>
                </div>
>>>>>>> 65d0f0fe804f9e820f74054ed5a86559f5d1ff22

    <!-- Success message, hidden by default -->
    <div class="alert alert-success success-message" id="successMessage">
        Registration successful!
    </div>

    <form id="regForm" action="register_process.php" method="POST" novalidate>
        <!-- Name Field -->
        <div class="mb-3">
            <label for="name" class="form-label">Full Name *</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" />
            <div class="error" id="nameError"></div>
        </div>

        <!-- Email Field -->
        <div class="mb-3">
            <label for="email" class="form-label">Email Address *</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" />
            <div class="error" id="emailError"></div>
        </div>

        <!-- Password Field -->
        <div class="mb-3">
            <label for="password" class="form-label">Password *</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" />
            <div class="error" id="passwordError"></div>
        </div>

        <!-- Confirm Password Field -->
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Confirm Password *</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm password" />
            <div class="error" id="confirmPasswordError"></div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success w-100">Register</button>
    </form>
</div>

<!-- jQuery Validation Script -->
<script>
$(document).ready(function() {
    $("#regForm").submit(function(e) {
        let isValid = true;

        // Clear all previous error messages
        $(".error").text("");
        $("#successMessage").hide();

<<<<<<< HEAD
        const name = $("#name").val().trim();
        const email = $("#email").val().trim();
        const password = $("#password").val();
        const confirmPassword = $("#confirmPassword").val();

        // Validate Name
        if (name === "") {
            $("#nameError").text("Please enter your name.");
            isValid = false;
=======
  const form = e.target;
  const fields = form.querySelectorAll('input, select, textarea');
  
  fields.forEach(field => {
    const error = field.nextElementSibling;
    field.classList.remove('error', 'valid');
    if (field.type !== 'submit' && field.name) {
      if (field.value.trim() === '') {
        valid = false;
        field.classList.add('error');
        if (error && error.classList.contains('error-text')) error.style.display = 'block';
      } else {
        if (field.name === 'email' && !emailPattern.test(field.value)) {
          valid = false;
          field.classList.add('error');
          error.innerText = "Enter a valid email address.";
          error.style.display = 'block';
        } else if (field.name === 'mobile' && !phonePattern.test(field.value)) {
          valid = false;
          field.classList.add('error');
          error.innerText = "Enter a valid 10-digit number.";
          error.style.display = 'block';
        } else if (field.name === 'pass' && !passwordPattern.test(field.value)) {
          valid = false;
          field.classList.add('error');
          error.innerText = "Password must be at least 8 characters, include uppercase, lowercase, number, and special character.";
          error.style.display = 'block';
        } else if (field.name === 'cpass' && field.value !== form.querySelector('[name="pass"]').value) {
          valid = false;
          field.classList.add('error');
          error.innerText = "Passwords do not match.";
          error.style.display = 'block';
        } else {
          field.classList.add('valid');
          if (error && error.classList.contains('error-text')) error.style.display = 'none';
>>>>>>> 65d0f0fe804f9e820f74054ed5a86559f5d1ff22
        }

<<<<<<< HEAD
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
        } else if (password.length < 6) {
            $("#passwordError").text("Password must be at least 6 characters.");
            isValid = false;
        }

        // Validate Confirm Password
        if (confirmPassword === "") {
            $("#confirmPasswordError").text("Please confirm your password.");
            isValid = false;
        } else if (password !== confirmPassword) {
            $("#confirmPasswordError").text("Passwords do not match.");
            isValid = false;
        }

        // If the form is valid, show the success message and allow submission
        if (isValid) {
            e.preventDefault(); // Prevent form submission for demo purposes
            $("#successMessage").show(); // Show the success alert
            // Optionally, you can submit the form here if you want to send it to the server:
            // this.submit();
        } else {
            e.preventDefault(); // Prevent submission if there are errors
        }
    });
=======
  if (valid) {
    this.submit();  // <-- sends data to PHP
}
>>>>>>> 65d0f0fe804f9e820f74054ed5a86559f5d1ff22
});
</script>

</body>
</html>
<<<<<<< HEAD
=======


<?php 
// include 'connection.php';  

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {

//     $name    = $_POST['fname'];
//     $email   = $_POST['email'];
//     $pass    = $_POST['pass'];
//     $cpass   = $_POST['cpass'];
//     $gender  = $_POST['gender'];
//     $mobile  = $_POST['mobile'];
//     $address = $_POST['address'];

//     if ($pass !== $cpass) {
//         echo "<script>alert('Passwords do not match!');</script>";
//         exit;
//     }

//     $check = $con->query("SELECT * FROM user WHERE u_email='$email'");
//     if ($check->num_rows > 0) {
//         echo "<script>alert('Email already registered!');</script>";
//         exit;
//     }

//     $sql = "INSERT INTO user (u_name, u_gender, u_email, u_pass, u_cpass, u_phone, u_address)
//             VALUES ('$name', '$gender', '$email', '$pass', '$cpass', '$mobile', '$address')";

//     if ($con->query($sql)) {
//         echo "<script>
//                 alert('Registration Successful!');
//                 window.location='login.php';
//               </script>";
//     } else {
//         echo "<script>alert('Error: Could not register.');</script>";
//     }
// }


include 'connection.php';  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name    = trim($_POST['fname']);
    $email   = trim($_POST['email']);
    $pass    = $_POST['pass'];
    $cpass   = $_POST['cpass'];
    $gender  = $_POST['gender'];
    $mobile  = trim($_POST['mobile']);
    $address = trim($_POST['address']);

    // Check passwords match
    if ($pass !== $cpass) {
        echo "<script>alert('Passwords do not match!');</script>";
        exit;
    }

    // Check if email already exists
    $stmt = $con->prepare("SELECT u_email FROM user WHERE u_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo "<script>alert('Email already registered!');</script>";
        $stmt->close();
        exit;
    }
    $stmt->close();

    // Hash the password
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    // Insert user securely
    $stmt = $con->prepare("INSERT INTO user (u_name, u_gender, u_email, u_pass, u_phone, u_address) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $gender, $email, $hashedPass, $mobile, $address);

    if ($stmt->execute()) {
        echo "<script>
                alert('Registration Successful!');
                window.location='login.php';
              </script>";
    } else {
        echo "<script>alert('Error: Could not register.');</script>";
    }
    $stmt->close();
}
?>




  <?php include'footer.php'; ?>
>>>>>>> 65d0f0fe804f9e820f74054ed5a86559f5d1ff22
