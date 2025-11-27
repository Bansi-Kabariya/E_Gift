<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/2d6e5e5e36.js" crossorigin="anonymous"></script>

  <?php include'header.php'; ?>

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
    .form-control, .form-select {
      border: 2px solid #018748ff;
      border-radius: 6px;
    }
    .form-control:focus, .form-select:focus {
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
    input.error, select.error, textarea.error {
      border-color: red !important;
    }
    input.valid, select.valid, textarea.valid {
      border-color: green !important;
    }
  </style>
</head>
<body>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card">
        <div class="header text-center">
          <h3 class="fw-bold mb-0"><i class="fa-solid fa-user-plus me-2"></i>Register</h3>
        </div>
        <div class="card-body p-4">
          <form id="registerForm" novalidate>
            <div class="row g-4">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label>Full Name</label>
                  <input type="text" class="form-control" name="fname" placeholder="Enter full name">
                  <div class="error-text">This field is required.</div>
                </div>

                <div class="mb-3">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter email">
                  <div class="error-text">Enter a valid email address.</div>
                </div>

                <div class="mb-3">
                  <label>Password</label>
                  <input type="password" class="form-control" name="pass" placeholder="Enter password">
                  <small class="text-danger">Password must be at least 8 characters, include uppercase, lowercase, number, and special character.</small>
                </div>

                <div class="mb-3">
                  <label>Confirm Password</label>
                  <input type="password" class="form-control" name="cpass" placeholder="Confirm password">
                  <div class="error-text">Passwords do not match.</div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="mb-3">
                  <label>Gender</label>
                  <select class="form-select" name="gender">
                    <option value="">Select Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                  </select>
                  <div class="error-text">Please select your gender.</div>
                </div>

                <div class="mb-3">
                  <label>Mobile Number</label>
                  <input type="text" class="form-control" name="mobile" placeholder="Enter mobile number">
                  <div class="error-text">Enter a valid 10-digit number.</div>
                </div>

                <!-- <div class="mb-3">
                  <label>Profile Photo</label>
                  <input type="file" class="form-control" name="profile_photo">
                  <div class="error-text">Please upload a photo (max 2MB).</div>
                </div> -->

                <div class="mb-3">
                  <label>Address</label>
                  <textarea class="form-control" name="address" rows="3" placeholder="Enter your address"></textarea>
                  <div class="error-text">This field is required.</div>
                </div>
              </div>

              <div class="col-12">
                <div class="d-grid">
                  <button type="submit" class="btn btn-teal">Register</button>
                </div>
                <div class="text-center mt-3">
                  <p>Already have an account?
                    <a href="login.php" class="fw-semibold" style="color:#0d9488;">Login Now</a>
                  </p>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.getElementById('registerForm').addEventListener('submit', function(e) {
  e.preventDefault();
  let valid = true;

  const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  const phonePattern = /^[0-9]{10}$/;
  const passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,}$/;

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
        } else if (field.name === 'password' && !passwordPattern.test(field.value)) {
          valid = false;
          field.classList.add('error');
          error.innerText = "Password must be at least 8 characters, include uppercase, lowercase, number, and special character.";
          error.style.display = 'block';
        } else if (field.name === 'confirm_password' && field.value !== form.querySelector('[name="password"]').value) {
          valid = false;
          field.classList.add('error');
          error.innerText = "Passwords do not match.";
          error.style.display = 'block';
        } else {
          field.classList.add('valid');
          if (error && error.classList.contains('error-text')) error.style.display = 'none';
        }
      }
    }
  });

  if (valid) {
    alert("✅ Registration Successful");
  }
});
</script>
</body>
</html>

<?php include'connection.php'; ?>

<?php

	// if(isset($_POST['user']))
	// {
	// 	$name     = $_POST['fname'];
  //   $gender  = $_POST['gender'];
	// 	$email    = $_POST['email'];
  //   $pass    = $_POST['pass'];
  //   $cpass    = $_POST['cpass'];
  //   $phone    = $_POST['mobile'];
	// 	$address = $_POST['address'];

	// 	$dup_email = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email'");
	// 	$dup_uname = mysqli_query($conn, "SELECT * FROM `user` WHERE username = '$uname'");

	// 	if(mysqli_num_rows($dup_email))
	// 	{
	// 		echo "
	// 			<script>
					
	// 				alert('This email is already taken');
	// 				window.location.href='register.php';

	// 			</script>
	// 			";
	// 	}
	// 	if(mysqli_num_rows($dup_uname))
	// 	{
	// 		echo "
	// 			<script>
					
	// 				alert('This username is already taken');
	// 				window.location.href='register.php';

	// 			</script>
	// 			";
	// 	}
	// 	else
	// 	{
	// 		mysqli_query($conn, "INSERT INTO `user`(`u_name`, `u_gender`, `u_email`, `u_pass`, `u_cpass`,`u_phone`,`u_adddress`) VALUES ('$name','$gender','$email','$pass','$cpass','$phone','$adress')");

	// 		echo "
	// 			<script>
					
	// 				alert('Register successfully!');
	// 				window.location.href='login.php';

	// 			</script>
	// 			";
	// 	}

	// }
?>


  <?php include'footer.php'; ?>