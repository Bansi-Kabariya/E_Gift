<?php 
include 'admin_panel_main.php';
include 'db_connect.php'; // your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Ensure DB connection exists
    if (!isset($con) || $con == null) {
        die("Database connection failed. Check db_connect.php");
    }

    $cname = $_POST['cname'];
    $cdesc = $_POST['cdesc'];
    $cimg_name = '';

    // Handle image upload
    if (isset($_FILES['cimg']) && $_FILES['cimg']['name'] != '') {
        $file = $_FILES['cimg'];
        $fileName = time() . '_' . $file['name'];
        $fileTmp = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif'];

        // Absolute path fix
        $uploadDir = __DIR__ . "/uploads/";

        // Create uploads folder if not exists
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $uploadPath = $uploadDir . $fileName;

        if (in_array($fileExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize <= 2 * 1024 * 1024) { // 2MB max
                    if (move_uploaded_file($fileTmp, $uploadPath)) {
                        $cimg_name = $fileName;
                    } else {
                        $error = "Failed to upload image.";
                    }
                } else {
                    $error = "Image size must be less than 2MB.";
                }
            } else {
                $error = "Error uploading image.";
            }
        } else {
            $error = "Invalid image type. Allowed: jpg, jpeg, png, gif.";
        }
    }

    // Insert category if no errors
    if (!isset($error)) {

        $stmt = $con->prepare("INSERT INTO category (c_name, c_desc, c_img) VALUES (?, ?, ?)");
        
        if (!$stmt) {
            die("Prepare failed: " . $con->error);
        }

        $stmt->bind_param("sss", $cname, $cdesc, $cimg_name);

        if ($stmt->execute()) {
            header("Location: manage_cat.php");  // REDIRECT UPDATED
            exit();
        } else {
            $error = "Database insert failed: " . $con->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Category</title>

<style>
  .section 
  {
    margin-top: 40px; 
    background: white;
    padding: 25px; 
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
    margin: 70px auto;
    width: 600px;
  }
  .section h2 
  {
    margin-bottom: 20px; 
    margin-left: 15px; 
    border-left: 5px solid #2e7d32; 
    padding-left: 10px;
  }
  form 
  { 
    display: flex; 
    flex-direction: column; 
    gap: 15px; 
    max-width: 500px; 
  }
  label 
  { 
    font-weight: bold; 
  }
  input, textarea 
  { 
    padding: 10px; 
    border-radius: 5px; 
    border: 1px solid #ccc; 
    width: 100%; 
  }
  input.error, textarea.error 
  { 
    border-color: red; 
  }
  input.valid, textarea.valid 
  { 
    border-color: green; 
  }
  .error-message 
  { 
    color: red; 
    font-size: 13px; 
    display: none; 
    margin-top: 5px; 
    margin-bottom: -5px; 
  }
  button 
  { 
    width: 200px; 
    padding: 10px; 
    border: none; 
    border-radius: 5px; 
    cursor: pointer; 
    background: #2e7d32; 
    color: white; 
    font-size: 16px; 
    align-self: center; 
  }
  button:hover 
  { 
    background: #1b5e20; 
  }
</style>

</head>
<body>

<div class="section">
<h2>Add Category</h2>

<?php if(isset($error)) { echo "<div style='color:red;margin-bottom:10px;'>$error</div>"; } ?>

<form id="categoryForm" action="" method="POST" enctype="multipart/form-data">
  <div>
    <label for="cname">Category Name:</label>
    <input type="text" id="cname" name="cname" placeholder="Enter category name">
    <div id="cnameError" class="error-message">Category name is required.</div>
  </div>

  <div>
    <label for="cdesc">Category Description:</label>
    <textarea id="cdesc" name="cdesc" rows="4" placeholder="Enter category description"></textarea>
    <div id="cdescError" class="error-message">Description is required.</div>
  </div>

  <div>
    <label for="cimg">Category Image:</label>
    <input type="file" id="cimg" name="cimg" accept="image/*">
    <div id="cimgError" class="error-message"></div>
  </div>

  <button type="submit">Save Category</button>

</form>
</div>

<script>
document.getElementById('categoryForm').addEventListener('submit', function(e) {
  let valid = true;
  const form = e.target;

  const cname = form.cname;
  const cdesc = form.cdesc;
  const cimg = form.cimg;

  [cname, cdesc, cimg].forEach(input => {
    input.classList.remove('error', 'valid');
    const errDiv = document.getElementById(input.id + 'Error');
    if (errDiv) errDiv.style.display = 'none';
  });

  if (cname.value.trim() === '') {
    valid = false;
    cname.classList.add('error');
    cnameError.style.display = 'block';
  } else cname.classList.add('valid');

  if (cdesc.value.trim() === '') {
    valid = false;
    cdesc.classList.add('error');
    cdescError.style.display = 'block';
  } else cdesc.classList.add('valid');

  if (cimg.files.length > 0) {
    const file = cimg.files[0];
    if (file.size > 2 * 1024 * 1024) {
      valid = false;
      cimg.classList.add('error');
      cimgError.textContent = "Image must be < 2MB";
      cimgError.style.display = "block";
    } else cimg.classList.add('valid');
  }

  if (!valid) e.preventDefault();
});
</script>

</body>
</html>
