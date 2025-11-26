<?php include 'admin_panel_main.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Products</title>

  <style>
    .section 
    {
      margin-top: 40px; 
      background: white;
      margin-right: 200px;
      padding: 20px; 
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.15);
      margin-left: 350px;
    }
    .section h2 
    {
      margin-bottom: 15px; 
      margin-left: 15px; 
      border-left: 5px solid #2e7d32; 
      padding-left: 10px;
    }
    table 
    {
      width: 100%; 
      border-collapse: collapse; 
      margin-top: 15px;
    }
    table th, table td 
    {
      border: 1px solid #ddd; 
      padding: 10px; 
      text-align: center;
    }
    table th 
    {
      background: #2e7d32; 
      color: white; 
    }
    button 
    {
      padding: 5px 10px;
      margin-left: 400px;
      border: none; 
      border-radius: 5px; 
      cursor: pointer;
      background: #2e7d32; 
      color: white;
    }
    button:hover 
    { 
      background: #1b5e20; 
    }
  </style>
</head>
<body>
  <div class="section">
    <h2>Manage Products
        <a href="add_product.php">
            <button>+ Add Product</button>
        </a> 
    </h2>
    <table>
      <tr>
        <th>Product ID</th>
        <th>Category ID</th>
        <th>Product Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Deseription</th>
        <th>Rating</th>
        
        
        <!-- <th>Stock</th>
        <th>Status</th> -->
      </tr>
      <tr>
        <td>P001</td>
        <td>C001</td>
        <td>Bamboo Toothbrush</td>
        <td><img src="images/bag1.jpg" alt="Eco Bag"></td>
        <td>₹120</td>
        <td>Reusable jute shopping bag</td>
        <td>8</td>

        <!-- <td>200</td>
        <td>Available</td> -->
      </tr>
      <tr>
        <td>P002</td>
        <td>C002</td>
        <td>Reusable Jute Bag</td>
        <td><img src="images/tooth.jpg" alt="Toothbrush"></td>
        <td>₹250</td>
        <td>Eco-friendly bamboo toothbrush</td>
        <td>9</td>
        
        <!-- <td>150</td>
        <td>Available</td> -->
      </tr>
      <tr>
        <td>P003</td>
        <td>C003</td>
        <td>Clay Water Bottle</td>
        <td><img src="images/book.jpg" alt="Notebook"></td>
        <td>₹400</td>
        <td>Notebook made from recycled paper</td>
        <td>10</td>
        
        
        <!-- <td>0</td>
        <td>Out of Stock</td> -->
      </tr>
      <tr>
        <td>P004</td>
        <td>C004</td>
        <td>Eco-Friendly Gift Box</td>
        <td><img src="images/bottle.jpg" alt="Clay Bottle"></td>
        <td>₹600</td>
        <td>Traditional clay bottle for natural cooling</td>
        <td>9</td>
        
        
        <!-- <td>75</td>
        <td>Available</td> -->
      </tr>
    </table>
  </div>
</body>
</html>
