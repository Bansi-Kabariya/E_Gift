<?php include 'admin_panel_main.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Coupon</title>

  <style>
    .section {
      margin-top: 70px; 
      background: white;
      padding: 25px; 
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.15);
      margin: 70px auto;
      width: 600px;
    }

    .section h2 {
      margin-bottom: 20px; 
      margin-left: 15px; 
      border-left: 5px solid #2e7d32; 
      padding-left: 10px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
      max-width: 500px;
    }

    label {
      font-weight: bold;
    }

    input, select {
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      width: 100%;
    }

    input.error, select.error {
      border-color: red;
    }

    input.valid, select.valid {
      border-color: green;
    }

    .error-message {
      color: red;
      font-size: 13px;
      display: none;
      margin-top: 5px;
      margin-bottom: -5px;
    }

    button {
      width: 200px;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      background: #2e7d32;
      color: white;
      font-size: 16px;
      align-self: center;
    }

    button:hover {
      background: #1b5e20;
    }
  </style>
</head>

<body>
  <div class="section">
    <h2>Add Coupon</h2>
    
    <form id="couponForm" action="save_coupon.php" method="POST">
      <div>
        <label for="cid">Coupon ID:</label>
        <input type="text" id="cid" name="cid" placeholder="Enter coupon ID (e.g., C001)">
        <div id="cidError" class="error-message">Coupon ID is required.</div>
      </div>

      <div>
        <label for="code">Coupon Code:</label>
        <input type="text" id="code" name="code" placeholder="Enter coupon code (e.g., WELCOME10)" style="text-transform: uppercase;">
        <div id="codeError" class="error-message">Coupon code is required.</div>
      </div>

      <div>
        <label for="discount">Discount:</label>
        <input type="text" id="discount" name="discount" placeholder="e.g., 10% Off or ₹200 Off">
        <div id="discountError" class="error-message">Discount is required.</div>
      </div>

      <div>
        <label for="validfrom">Valid From:</label>
        <input type="date" id="validfrom" name="validfrom">
        <div id="validfromError" class="error-message">Valid from date is required.</div>
      </div>

      <div>
        <label for="validto">Valid To:</label>
        <input type="date" id="validto" name="validto">
        <div id="validtoError" class="error-message">Valid to date is required.</div>
      </div>

      <div>
        <label for="status">Status:</label>
        <select id="status" name="status">
          <option value="">-- Select Status --</option>
          <option value="Active">Active</option>
          <option value="Expired">Expired</option>
        </select>
        <div id="statusError" class="error-message">Please select a status.</div>
      </div>

      <button type="submit">Save Coupon</button>
    </form>
  </div>

  <script>
    document.getElementById('couponForm').addEventListener('submit', function(e) {
      let valid = true;
      const form = e.target;

      const cid = form.cid;
      const code = form.code;
      const discount = form.discount;
      const validfrom = form.validfrom;
      const validto = form.validto;
      const status = form.status;

      // Reset validation
      [cid, code, discount, validfrom, validto, status].forEach(input => {
        input.classList.remove('error', 'valid');
        const errorDiv = document.getElementById(input.id + 'Error');
        if (errorDiv) errorDiv.style.display = 'none';
      });

      // Coupon ID
      if (cid.value.trim() === '') {
        valid = false;
        cid.classList.add('error');
        document.getElementById('cidError').style.display = 'block';
      } else {
        cid.classList.add('valid');
      }

      // Coupon Code
      if (code.value.trim() === '') {
        valid = false;
        code.classList.add('error');
        document.getElementById('codeError').style.display = 'block';
      } else {
        code.classList.add('valid');
      }

      // Discount
      if (discount.value.trim() === '') {
        valid = false;
        discount.classList.add('error');
        document.getElementById('discountError').style.display = 'block';
      } else {
        discount.classList.add('valid');
      }

      // Valid From
      if (validfrom.value.trim() === '') {
        valid = false;
        validfrom.classList.add('error');
        document.getElementById('validfromError').style.display = 'block';
      } else {
        validfrom.classList.add('valid');
      }

      // Valid To
      if (validto.value.trim() === '') {
        valid = false;
        validto.classList.add('error');
        document.getElementById('validtoError').style.display = 'block';
      } else if (validfrom.value && validto.value && new Date(validto.value) < new Date(validfrom.value)) {
        valid = false;
        validto.classList.add('error');
        document.getElementById('validtoError').innerText = 'Valid To date must be after Valid From date.';
        document.getElementById('validtoError').style.display = 'block';
      } else {
        validto.classList.add('valid');
      }

      // Status
      if (status.value === '') {
        valid = false;
        status.classList.add('error');
        document.getElementById('statusError').style.display = 'block';
      } else {
        status.classList.add('valid');
      }

      if (!valid) {
        e.preventDefault();
      }
    });
  </script>
</body>
</html>
