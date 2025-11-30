<?php
session_start();
include 'header.php';
include 'connection.php';

// if (!isset($_SESSION['u_id'])) {
//     echo "<script>alert('Please login to view cart'); window.location='login.php';</script>";
//     exit;
// }

// $u_id = $_SESSION['u_id'];

// fetch cart items
$stmt = $con->prepare("SELECT * FROM cart WHERE u_id = ?");
$stmt->bind_param("i", $u_id);
$stmt->execute();
$cart_res = $stmt->get_result();
?>

<!doctype html>
<html>
<head>
<<<<<<< HEAD
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cart</title>

  <style>
    .section 
    {
      margin-top: 100px; 
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
    <a href="order.php">
            <button onclick="order.php">Make Order</button>
        </a> 
  </div>
        <?php include'footer.php'; ?>
=======
  <meta charset="utf-8">
  <title>Your Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5">
  <h2 class="mb-4">Your Cart</h2>
>>>>>>> 65d0f0fe804f9e820f74054ed5a86559f5d1ff22

  <?php if ($cart_res && $cart_res->num_rows > 0): ?>
    <div class="table-responsive">
      <table class="table table-bordered bg-white">
        <thead>
          <tr>
            <th>Product</th>
            <th class="text-center">Price</th>
            <th class="text-center" style="width:150px">Quantity</th>
            <th class="text-center">Subtotal</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $grandTotal = 0;
            while ($row = $cart_res->fetch_assoc()):
              $grandTotal += intval($row['subtotal']);
          ?>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <img src="<?= '../admin_panel/' . htmlspecialchars($row['img']); ?>" alt="" style="width:80px;height:80px;object-fit:cover;border-radius:8px;margin-right:15px;">
                  <div>
                    <strong><?= htmlspecialchars($row['product_name']); ?></strong><br>
                    <small>Product ID: <?= intval($row['p_id']); ?></small>
                  </div>
                </div>
              </td>
              <td class="text-center">₹<?= number_format(intval($row['p_price'])); ?></td>
              <td class="text-center">
                <form method="post" action="cart_action.php" class="d-flex justify-content-center">
                  <input type="hidden" name="action" value="update_qty">
                  <input type="hidden" name="cart_id" value="<?= intval($row['cart_id']); ?>">
                  <input type="number" name="qty" value="<?= intval($row['qty']); ?>" min="1" class="form-control" style="width:90px;">
                  <button type="submit" class="btn btn-sm btn-primary ms-2">Update</button>
                </form>
              </td>
              <td class="text-center">₹<?= number_format(intval($row['subtotal'])); ?></td>
              <td class="text-center">
                <a href="cart_action.php?action=remove&cart_id=<?= intval($row['cart_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Remove this item?')">Remove</a>
              </td>
            </tr>
          <?php endwhile; ?>
          <tr>
            <td colspan="3" class="text-end"><strong>Grand Total</strong></td>
            <td class="text-center"><strong>₹<?= number_format($grandTotal); ?></strong></td>
            <td class="text-center">
              <a href="cart_action.php?action=clear" class="btn btn-sm btn-outline-danger" onclick="return confirm('Clear cart?')">Clear Cart</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="d-flex justify-content-between mt-4">
      <a href="products.php" class="btn btn-secondary">Continue Shopping</a>
      <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
    </div>

  <?php else: ?>
    <div class="alert alert-info">Your cart is empty. <a href="products.php">Browse products</a></div>
  <?php endif; ?>

</div>
</body>
</html>

<?php include 'footer.php'; ?>
