
<?php
// Handle form submission
if(isset($_POST['place_order'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $payment = $_POST['payment_method'];

    // Static cart total
    $subtotal = 800;  // Example: Jute Bag + Eco Bottle
    $tax = round($subtotal * 0.05, 2);
    $shipping = 50;
    $grandTotal = $subtotal + $tax + $shipping;

    $success = "Thank you, $name! Your order has been placed successfully.<br>
                Order Total: ₹$grandTotal<br>
                Payment Method: $payment";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Order Form - Eco-Friendly Gifts</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/2d6e5e5e36.js" crossorigin="anonymous"></script>
<style>
body {
  background-color: #f3f4f6;
  font-family: "Poppins", sans-serif;
}
.order-section {
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
  margin-bottom: 20px;
}
th, td {
  border: 1px solid #e5e7eb;
  padding: 15px;
  text-align: center;
}
th {
  background: #0d9488;
  color: #fff;
  font-weight: 600;
}
tr:hover {
  background-color: #f9fafb;
}
.form-control, .form-select {
  border: 2px solid #14b8a6;
  border-radius: 6px;
  padding: 12px;
  margin-bottom: 5px;
}
.form-control:focus, .form-select:focus {
  border-color: #0d9488;
  box-shadow: 0 0 0 0.2rem rgba(13,148,136,0.25);
}
.error-text {
  font-size: 0.9rem;
  color: #dc3545;
  display: none;
  margin-top: 5px;
  margin-bottom: 10px;
}
input.error, textarea.error {
  border-color: #dc3545 !important;
}
input.valid, textarea.valid {
  border-color: #28a745 !important;
}
.total-section {
  background: #f9fafb;
  padding: 20px;
  border-radius: 8px;
  margin-top: 20px;
}
.total-section p {
  margin: 8px 0;
  font-size: 1rem;
  color: #374151;
}
.total-section h3 {
  color: #0d9488;
  font-weight: 700;
  margin-top: 15px;
  font-size: 1.5rem;
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
.success-alert {
  background: #d1fae5;
  color: #065f46;
  padding: 20px;
  border-radius: 8px;
  margin-bottom: 20px;
  border-left: 5px solid #10b981;
}
label {
  font-weight: 500;
  margin-bottom: 8px;
  display: block;
  color: #374151;
}
.payment-options {
  margin-top: 20px;
}
.payment-options label {
  display: inline-flex;
  align-items: center;
  margin-right: 20px;
  cursor: pointer;
}
.payment-options input[type="radio"] {
  width: auto;
  margin-right: 8px;
}
</style>
<?php include'header.php'; ?> 
</head>
<body>

<div class="order-section">
  <?php if(isset($success)) { echo "<div class='success-alert'><i class='fa-solid fa-circle-check me-2'></i>$success</div>"; } ?>

  <div class="card">
    <div class="header">
      <h3 class="fw-bold mb-0"><i class="fa-solid fa-clipboard-list me-2"></i>Order Details</h3>
    </div>
    <div class="card-body">
      <?php include'odetail.php'; ?>

      <div class="total-section text-end">
        <p>Subtotal: ₹800</p>
        <p>Tax (5% GST): ₹40</p>
        <p>Shipping: ₹50</p>
        <h3>Grand Total: ₹890</h3>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="header">
      <h3 class="fw-bold mb-0"><i class="fa-solid fa-file-invoice me-2"></i>Billing Details</h3>
    </div>
    <div class="card-body">
      <form id="orderForm" method="POST" action="" novalidate>
        <div class="mb-3">
          <label>Full Name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Enter your full name">
          <div class="error-text" id="nameError">Full name is required.</div>
        </div>

        <div class="mb-3">
          <label>Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
          <div class="error-text" id="emailError">Enter a valid email address.</div>
        </div>

        <div class="mb-3">
          <label>Phone Number</label>
          <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter 10-digit phone number">
          <div class="error-text" id="phoneError">Enter a valid 10-digit phone number.</div>
        </div>

        <div class="mb-3">
          <label>Billing Address</label>
          <textarea class="form-control" name="address" id="address" rows="4" placeholder="Enter your complete billing address"></textarea>
          <div class="error-text" id="addressError">Billing address is required.</div>
        </div>

        <div class="payment-options">
          <label><strong>Payment Method</strong></label>
          <div>
            <label>
              <input type="radio" name="payment_method" value="cod" checked>
              <i class="fa-solid fa-money-bill-wave me-1"></i> Cash on Delivery
            </label>
            <label>
              <input type="radio" name="payment_method" value="online">
              <i class="fa-solid fa-credit-card me-1"></i> Pay Online
            </label>
          </div>
        </div>

        <div class="d-grid mt-4">
          <button type="submit" name="place_order" class="btn-teal">
            <i class="fa-solid fa-check-circle me-2"></i>Place Order
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
document.getElementById('orderForm').addEventListener('submit', function(e) {
  let valid = true;
  const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  const phonePattern = /^[0-9]{10}$/;

  const form = e.target;
  const name = form.name;
  const email = form.email;
  const phone = form.phone;
  const address = form.address;

  // Reset validation
  [name, email, phone, address].forEach(input => {
    input.classList.remove('error', 'valid');
    const errorDiv = document.getElementById(input.id + 'Error');
    errorDiv.style.display = 'none';
  });

  // Validate name
  if (name.value.trim() === '') {
    valid = false;
    name.classList.add('error');
    document.getElementById('nameError').style.display = 'block';
  } else {
    name.classList.add('valid');
  }

  // Validate email
  if (email.value.trim() === '') {
    valid = false;
    email.classList.add('error');
    document.getElementById('emailError').innerText = 'Email is required.';
    document.getElementById('emailError').style.display = 'block';
  } else if (!emailPattern.test(email.value)) {
    valid = false;
    email.classList.add('error');
    document.getElementById('emailError').innerText = 'Enter a valid email address.';
    document.getElementById('emailError').style.display = 'block';
  } else {
    email.classList.add('valid');
  }

  // Validate phone
  if (phone.value.trim() === '') {
    valid = false;
    phone.classList.add('error');
    document.getElementById('phoneError').innerText = 'Phone number is required.';
    document.getElementById('phoneError').style.display = 'block';
  } else if (!phonePattern.test(phone.value)) {
    valid = false;
    phone.classList.add('error');
    document.getElementById('phoneError').innerText = 'Enter a valid 10-digit phone number.';
    document.getElementById('phoneError').style.display = 'block';
  } else {
    phone.classList.add('valid');
  }

  // Validate address
  if (address.value.trim() === '') {
    valid = false;
    address.classList.add('error');
    document.getElementById('addressError').style.display = 'block';
  } else {
    address.classList.add('valid');
  }

  if (!valid) {
    e.preventDefault();
  }
});
</script>

<?php include'footer.php'; ?>

</body>
</html>
