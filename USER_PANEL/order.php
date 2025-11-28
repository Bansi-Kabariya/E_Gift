<?php
$nameErr = $emailErr = $phoneErr = $addressErr = "";
$name = $email = $phone = $address = "";
$success = "";

if(isset($_POST['place_order'])) {
    $valid = true;

    // Validate Name
    if(empty($_POST['name'])) {
        $nameErr = "Full name is required";
        $valid = false;
    } else {
        $name = htmlspecialchars($_POST['name']);
    }

    // Validate Email
    if(empty($_POST['email'])) {
        $emailErr = "Email is required";
        $valid = false;
    } elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        $valid = false;
    } else {
        $email = htmlspecialchars($_POST['email']);
    }

    // Validate Phone
    if(empty($_POST['phone'])) {
        $phoneErr = "Phone number is required";
        $valid = false;
    } elseif(!preg_match("/^[0-9]{10}$/", $_POST['phone'])) {
        $phoneErr = "Enter a valid 10-digit phone number";
        $valid = false;
    } else {
        $phone = htmlspecialchars($_POST['phone']);
    }

    // Validate Address
    if(empty($_POST['address'])) {
        $addressErr = "Billing address is required";
        $valid = false;
    } else {
        $address = htmlspecialchars($_POST['address']);
    }

    // If all valid
    if($valid) {
        $payment = $_POST['payment_method'];
        $subtotal = 800;
        $tax = round($subtotal * 0.05, 2);
        $shipping = 50;
        $grandTotal = $subtotal + $tax + $shipping;

        $success = "Thank you, $name! Your order has been placed successfully.<br>
                    Order Total: ₹$grandTotal<br>
                    Payment Method: $payment";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Static Order Form - Eco-Friendly Gifts</title>
<style>
body {font-family: Arial; background: #FAFAFA; padding:20px; color:#333;}
input, textarea {width:100%; padding:8px; margin:5px 0;}
button {background:#66BB6A; color:#fff; padding:10px 20px; border:none; cursor:pointer;}
button:hover {background:#2E7D32;}
.error {color:red; font-size:14px;}
.success {background:#DFF2BF; color:#4F8A10; padding:10px; margin-bottom:20px;}
</style>
<?php include 'header.php'; ?>
</head>
<body>

<h2>Order Detail</h2>

<?php if($success) { echo "<div class='success'>$success</div>"; } ?>

<div class="total">
<p>Subtotal: ₹800</p>
<p>Tax (5% GST): ₹40</p>
<p>Shipping: ₹50</p>
<h3>Grand Total: ₹890</h3>
</div>

<h2>Billing Details</h2>
<form method="POST" action="">
    <input type="text" name="name" placeholder="Full Name" value="<?php echo $name; ?>">
    <div class="error"><?php echo $nameErr; ?></div>

    <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
    <div class="error"><?php echo $emailErr; ?></div>

    <input type="text" name="phone" placeholder="Phone Number" value="<?php echo $phone; ?>">
    <div class="error"><?php echo $phoneErr; ?></div>

    <textarea name="address" placeholder="Billing Address"><?php echo $address; ?></textarea>
    <div class="error"><?php echo $addressErr; ?></div>

    <h3>Payment Method</h3>
    <label><input type="radio" name="payment_method" value="cod" checked> Cash on Delivery</label><br>
    <label><input type="radio" name="payment_method" value="online"> Pay Online</label><br><br>

    <button type="submit" name="place_order">Place Order</button>
</form>

<?php include 'footer.php'; ?>
</body>
</html>
