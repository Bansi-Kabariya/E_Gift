<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- <?php include'header.php'; ?> -->

</head>
<body>
    <?php
=======
<?php
>>>>>>> 65d0f0fe804f9e820f74054ed5a86559f5d1ff22
session_start();
include 'header.php';
include 'connection.php';

// if (!isset($_SESSION['u_id'])) {
//     echo "<script>alert('Please login to checkout'); window.location='login.php';</script>";
//     exit;
// }

// $u_id = $_SESSION['u_id'];

// fetch cart items and calculate total
$stmt = $con->prepare("SELECT * FROM cart WHERE u_id = ?");
$stmt->bind_param("i", $u_id);
$stmt->execute();
$cart_res = $stmt->get_result();

$grandTotal = 0;
while ($r = $cart_res->fetch_assoc()) {
    $grandTotal += intval($r['subtotal']);
}

// optionally fetch user address info if stored (skip if not)
?>
<!DOCTYPE html>
<html>
<head><title>Checkout</title></head>
<body>
<h2>Checkout</h2>

<<<<<<< HEAD
<table border="1">
<tr><th>Item</th><th>Qty</th><th>Price</th><th>Subtotal</th></tr>
<?php
if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $id=>$item){
        $subtotal = $item['price'] * $item['qty'];
        $total += $subtotal;
        echo "<tr>
                <td>{$item['name']}</td>
                <td>{$item['qty']}</td>
                <td>₹{$item['price']}</td>
                <td>₹$subtotal</td>
              </tr>";
    }
}
?>
</table>
<h3>Total: ₹<?= $total ?></h3>

<!-- PayPal Sandbox Example -->
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="business" value="your-test-paypal@business.com">
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="item_name" value="Eco-Friendly Gifts">
  <input type="hidden" name="amount" value="<?= $total ?>">
  <input type="hidden" name="currency_code" value="INR">
  <input type="hidden" name="return" value="http://localhost/eco-gift/success.php">
  <input type="hidden" name="cancel_return" value="http://localhost/eco-gift/cancel.php">
  <input type="submit" value="Pay Now">
</form>

</body>
</html>

=======
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Checkout</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5">
  <h2 class="mb-4">Checkout</h2>

  <?php if ($grandTotal <= 0): ?>
    <div class="alert alert-warning">Your cart is empty. <a href="products.php">Shop now</a></div>
  <?php else: ?>

  <div class="row">
    <div class="col-md-7">
      <div class="card mb-3">
        <div class="card-body">
          <h5>Billing & Shipping Details</h5>
          <form method="post" action="place_order.php">
            <input type="hidden" name="total_amount" value="<?= intval($grandTotal); ?>">

            <div class="mb-2">
              <label>Name</label>
              <input type="text" name="name" class="form-control" required value="<?= htmlspecialchars($_SESSION['u_name'] ?? '') ?>">
            </div>

            <div class="mb-2">
              <label>Phone</label>
              <input type="text" name="phone" class="form-control" required>
            </div>

            <div class="mb-2">
              <label>Address</label>
              <textarea name="address" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-2">
              <label>Payment Method</label>
              <select name="payment_method" class="form-select" required>
                <option value="COD">Cash on Delivery</option>
                <option value="Online">Online Payment (Placeholder)</option>
              </select>
            </div>

            <button type="submit" class="btn btn-success">Place Order - ₹<?= number_format($grandTotal); ?></button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-5">
      <div class="card">
        <div class="card-body">
          <h5>Order Summary</h5>
          <?php
            // re-fetch items for display
            $stmt = $con->prepare("SELECT * FROM cart WHERE u_id = ?");
            $stmt->bind_param("i", $u_id);
            $stmt->execute();
            $items = $stmt->get_result();
          ?>
          <ul class="list-group mb-3">
            <?php while ($it = $items->fetch_assoc()): ?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                  <strong><?= htmlspecialchars($it['product_name']); ?></strong><br>
                  <small>Qty: <?= intval($it['qty']); ?></small>
                </div>
                <span>₹<?= number_format(intval($it['subtotal'])); ?></span>
              </li>
            <?php endwhile; ?>
            <li class="list-group-item d-flex justify-content-between">
              <strong>Total</strong>
              <strong>₹<?= number_format($grandTotal); ?></strong>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <?php endif; ?>
</div>
>>>>>>> 65d0f0fe804f9e820f74054ed5a86559f5d1ff22
</body>
</html>

<?php include 'footer.php'; ?>
