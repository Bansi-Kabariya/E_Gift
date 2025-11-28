<!DOCTYPE html>
<html lang="en">
<head>
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
});
</script>

</body>
</html>
