<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2d6e5e5e36.js" crossorigin="anonymous"></script>
    <style>
      body {
        background-color: #f3f4f6;
        font-family: "Poppins", sans-serif;
      }
      .checkout-section {
        margin-top: 100px;
        margin-bottom: 50px;
        margin-left: 30px;
        margin-right: 30px;
      }
      .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        margin-bottom: 20px;
      }
      .header {
        background-color: #0d9488;
        color: white;
        padding: 20px;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
      }
      .card-body {
        padding: 30px;
      }
      table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
      }
      table th, table td {
        border: 1px solid #e5e7eb;
        padding: 15px;
        text-align: center;
      }
      table th {
        background: #0d9488;
        color: white;
        font-weight: 600;
      }
      table tr:hover {
        background-color: #f9fafb;
      }
      .total-section {
        text-align: right;
        margin-top: 25px;
        padding: 20px;
        background: #f9fafb;
        border-radius: 8px;
      }
      .total-section h3 {
        color: #0d9488;
        font-weight: 700;
        margin: 0;
      }
      .btn-teal {
        background-color: #0d9488;
        color: #fff;
        font-weight: 600;
        padding: 12px 40px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.3s;
        font-size: 16px;
      }
      .btn-teal:hover {
        background-color: #0b7d72;
      }
      .payment-form {
        text-align: right;
        margin-top: 20px;
      }
    </style>
    <?php include'header.php'; ?>
</head>
<body>
<?php
session_start();
$total = 0;
?>

<div class="checkout-section">
  <div class="card">
    <div class="header">
      <h3 class="fw-bold mb-0"><i class="fa-solid fa-shopping-cart me-2"></i>Checkout</h3>
    </div>
    <div class="card-body">
      <table>
        <tr>
          <th>Item</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Subtotal</th>
        </tr>
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

      <div class="total-section">
        <h3>Total: ₹<?= $total ?></h3>
      </div>

      <!-- PayPal Sandbox Example -->
      <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" class="payment-form">
        <input type="hidden" name="business" value="your-test-paypal@business.com">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="item_name" value="Eco-Friendly Gifts">
        <input type="hidden" name="amount" value="<?= $total ?>">
        <input type="hidden" name="currency_code" value="INR">
        <input type="hidden" name="return" value="http://localhost/eco-gift/success.php">
        <input type="hidden" name="cancel_return" value="http://localhost/eco-gift/cancel.php">
        <button type="submit" class="btn-teal">
          <i class="fa-solid fa-credit-card me-2"></i>Pay Now
        </button>
      </form>
    </div>
  </div>
</div>

<?php include'footer.php'; ?>
</body>
</html>