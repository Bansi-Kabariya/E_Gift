
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cart</title>

  <style>
    .section 
    {
      margin-top: 100px; 
      margin-bottom: 50px;
      background: white;
      margin-right: 30px;
      margin-left: 30px;
      padding: 30px; 
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .section h2 
    {
      margin-bottom: 25px; 
      margin-left: 0; 
      border-left: 5px solid green; 
      padding-left: 15px;
      color: #374151;
      font-weight: 600;
    }
    table 
    {
      width: 100%; 
      border-collapse: collapse; 
      margin-top: 20px;
    }
    table th, table td 
    {
      border: 1px solid #e5e7eb; 
      padding: 15px; 
      text-align: center;
    }
    table th 
    {
      background: green; 
      color: white;
      font-weight: 600;
    }
    table tr:hover 
    {
      background-color: #f9fafb;
    }
    table img 
    {
      max-width: 80px;
      border-radius: 6px;
    }
    .btn-container 
    {
      text-align: right;
      margin-top: 25px;
    }
    button 
    {
      padding: 12px 40px;
      border: none; 
      border-radius: 6px; 
      cursor: pointer;
      background: green; 
      color: white;
      font-weight: 600;
      font-size: 16px;
      transition: 0.3s;
    }
    button:hover 
    { 
      background: green; 
    }
  </style>
  <?php include'header.php'; ?> 
</head>
<body>
  <div class="section">
    <h2>Your Eco-Friendly Cart
        
    </h2>
    <table>
      <tr>
        <th>Product ID</th>
        <th>Name</th>
        <th>Category</th>
                <th>Deseription</th>
        <th>Price</th>
        <th>Image</th>
        <!-- <th>Stock</th>
        <th>Status</th> -->
      </tr>
      <tr>
        <td>P001</td>
        <td>jute bag</td>
        <td>Carry Bag</td>
                <td>Reusable jute shopping bag</td>
        <td>₹120</td>
        <td><img src="img/c2.jpg"></td>
        <!-- <td>200</td>
        <td>Available</td> -->
      </tr>
      <tr>
        <td>P002</td>
        <td>Reusable Jute Bag</td>
        <td>Accessories</td>
                <td>Eco-friendly bag with trendy style</td>
        <td>₹250</td>
        <td><img src="img/c3.jpg"></td>
        <!-- <td>150</td>
        <td>Available</td> -->
      </tr>
      <tr>
        <td>P003</td>
        <td> Water Bottle</td>
        <td>Bottle , Sipper ,fock</td>
                <td>Reusable , Eco-Friendly</td>
        <td>₹400</td>
        <td><img src="img/3.jpg"></td>
        <!-- <td>0</td>
        <td>Out of Stock</td> -->
      </tr>
      <tr>
        <td>P004</td>
        <td>Paint Brush</td>
        <td>Each size paint brush</td>
                 <td>Eco-Friendly paint brush</td>
        <td>₹600</td>
        <td><img src="img/c9.jpg"></td>
        <!-- <td>75</td>
        <td>Available</td> -->
      </tr>
      
    </table>
    <div class="btn-container">
      <a href="order.php">
        <button>Make Order</button>
      </a>
    </div>
  </div>
        <?php include'footer.php'; ?>

</body>
</html>