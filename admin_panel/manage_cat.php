<?php 
include 'admin_panel_main.php'; 
include 'db_connect.php';   // Ensure DB connection file is included
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Categories</title>

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
    .section h2 {
      margin-bottom: 15px; 
      margin-left: 15px; 
      border-left: 5px solid #2e7d32; 
      padding-left: 10px;
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
    button {
      padding: 5px 10px;
      margin-left: 400px;
      border: none; 
      border-radius: 5px; 
      cursor: pointer;
      background: #2e7d32; 
      color: white;
    }
    button:hover { 
      background: #1b5e20; 
    }
    img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 5px;
    }
  </style>
</head>
<body>

  <div class="section">
    <h2>Manage Categories
        <a href="add_cat.php">
            <button>+ Add Category</button>
        </a> 
    </h2>

    <table>
      <tr>
        <th>Category ID</th>
        <th>Category Name</th>
        <th>Description</th>
        <th>Image</th>
      </tr>

      <?php
      // Fetch categories from database
      $sql = "SELECT * FROM category";
      $result = $con->query($sql);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>{$row['c_id']}</td>
                      <td>{$row['c_name']}</td>
                      <td>{$row['c_desc']}</td>
                      <td><img src='uploads/{$row['c_img']}'></td>
                    </tr>";
          }
      } else {
          echo "<tr><td colspan='4'>No categories found.</td></tr>";
      }
      ?>
    </table>

  </div>

</body>
</html>