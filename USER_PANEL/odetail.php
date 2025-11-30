<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cart</title>

  <style>
    .section 
    {
      margin-top: 10px; 
      background: white;
      margin-right: 10px;
      padding: 20px; 
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.15);
      margin-left: 10px;
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
      padding: 30px 30px;
      margin-left: 1200px;
      border: none; 
      border-radius: 10px; 
      cursor: pointer;
      background: #2e7d32; 
      color: white;
    }
    button:hover 
    { 
      background: #1b5e20; 
    }
  </style>
      <?php include'header.php'; ?>

</head>
<body>
  <div class="section">
    <h2>Your Eco-Friendly Order Detail
        
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
   
  </div>
        <?php include'footer.php'; ?>

</body>
</html>