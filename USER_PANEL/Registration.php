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

<!-- Registration Form -->
<div class="registration-form">
    <h3 class="text-center mb-4">Create Account</h3>

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

        const name = $("#name").val().trim();
        const email = $("#email").val().trim();
        const password = $("#password").val();
        const confirmPassword = $("#confirmPassword").val();

        // Validate Name
        if (name === "") {
            $("#nameError").text("Please enter your name.");
            isValid = false;
        }

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
});
</script>

</body>
</html>
