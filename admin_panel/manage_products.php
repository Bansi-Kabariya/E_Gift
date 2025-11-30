<?php 
include 'admin_panel_main.php'; 
include 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pname = $_POST['pname'];
    $pcat  = $_POST['pcat'];
    $price = $_POST['price'];
    $pdesc = $_POST['pdesc'];

    // Image upload
    $imageName = $_FILES['pimg']['name'];
    $tmpName   = $_FILES['pimg']['tmp_name'];

    // Upload folder
    $folder = "uploads/";
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    // Unique file name
    $finalPath = $folder . uniqid() . "_" . $imageName;

    // Move file
    move_uploaded_file($tmpName, $finalPath);

    // DB Insert
    $insertSQL = "INSERT INTO product (p_name, c_id, p_price, p_desc, p_image_url)
                  VALUES ('$pname', '$pcat', '$price', '$pdesc', '$finalPath')";

    if ($con->query($insertSQL)) {
        // Redirect to avoid duplicate submission on refresh
        header("Location: manage_products.php?success=1");
        exit;
    } 
    else {
        echo "<script>alert('Error Adding Product');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Products</title>

  <style>
    .section {
      margin-top: 40px; 
      background: white;
      margin-right: 200px;
      padding: 20px; 
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.15);
      margin-left: 350px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }
    table th, table td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
    }
    table th {
      background: #2e7d32;
      color: white;
    }
    img {
      width: 60px;
      height: 60px;
      border-radius: 8px;
    }
    button {
      padding: 5px 10px;
      margin-left: 400px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      background: #2e7d32;
      color: white;
    }
    button:hover { background: #1b5e20; }
  </style>
</head>

<body>

<!-- ✅ Success Popup -->
<?php 
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<script>alert('Product Added Successfully!');</script>";
}
?>

<div class="section">

    <h2>Manage Products
        <a href="add_product.php">
            <button>+ Add Product</button>
        </a>
    </h2>

    <table>
      <tr>
        <th>Product ID</th>
        <th>Category</th>
        <th>Product Name</th>
        <th>Image</th>
        <th>Description</th>
        <th>Price</th>
      </tr>

      <?php
      // Fetch products
      $sql = "SELECT product.*, category.c_name 
              FROM product 
              INNER JOIN category ON product.c_id = category.c_id
              ORDER BY product.p_id DESC";

      $result = $con->query($sql);

      while ($row = $result->fetch_assoc()) 
        {
      ?>
      <tr>
        <td><?= $row['p_id'] ?></td>
        <td><?= $row['c_name'] ?></td>
        <td><?= $row['p_name'] ?></td>
        <td><img src="<?= $row['p_image_url'] ?>"></td>
        <td><?= $row['p_desc'] ?></td>
        <td>₹<?= $row['p_price'] ?></td>
      </tr>
      <?php 
    } ?>

    </table>

</div>
</body>
</html>
