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
  <meta charset="utf-8">
  <title>Your Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5">
  <h2 class="mb-4">Your Cart</h2>

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
