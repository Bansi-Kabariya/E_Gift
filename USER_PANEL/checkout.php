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
session_start();
$total = 0;
?>
<!DOCTYPE html>
<html>
<head><title>Checkout</title></head>
<body>
<h2>Checkout</h2>

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

</body>
</html>