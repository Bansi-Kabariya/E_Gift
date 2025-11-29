<?php include 'admin_panel_main.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>

  <style>
    .section {
      margin-top: 40px; 
      background: white;
      margin-right: 200px;
      padding: 25px; 
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.15);
      margin-left: 350px;
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

    input, select, textarea {
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      width: 100%;
    }

    input.error, select.error, textarea.error {
      border-color: red;
    }

    input.valid, select.valid, textarea.valid {
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
    <h2>Add Product</h2>
    
    <form id="productForm" action="save_product.php" method="POST" enctype="multipart/form-data">
      <div>
        <label for="pname">Product Name:</label>
        <input type="text" id="pname" name="pname" placeholder="Enter product name">
        <div id="pnameError" class="error-message">Product name is required.</div>
      </div>

      <div>
        <label for="pcat">Category:</label>
        <select id="pcat" name="pcat">
          <option value="">-- Select Category --</option>
          <option value="C001"></option>
          <option value="C002"></option>
          <option value="C003"></option>
          <option value="C004"></option>
        </select>
        <div id="pcatError" class="error-message">Please select a category.</div>
      </div>

      <div>
        <label for="price">Price (₹):</label>
        <input type="number" id="price" name="price" placeholder="Enter price">
        <div id="priceError" class="error-message"></div>
      </div>

      <div>
        <label for="pdesc">Description:</label>
        <textarea id="pdesc" name="pdesc" rows="4" placeholder="Enter product description"></textarea>
        <div id="pdescError" class="error-message">Description is required.</div>
      </div>

      <div>
        <label for="pimg">Product Image:</label>
        <input type="file" id="pimg" name="pimg" accept="image/*">
        <div id="pimgError" class="error-message"></div>
      </div>

      <button type="submit">Save Product</button>
    </form>
  </div>

  <script>
    document.getElementById('productForm').addEventListener('submit', function(e) {
      let valid = true;
      const form = e.target;
      
      const pname = form.pname;
      const pcat = form.pcat;
      const price = form.price;
      const pdesc = form.pdesc;
      const pimg = form.pimg;

      // Reset validation
      [pname, pcat, price, pdesc, pimg].forEach(input => {
        input.classList.remove('error', 'valid');
        const errorDiv = document.getElementById(input.id + 'Error');
        if (errorDiv) errorDiv.style.display = 'none';
      });

      // Validate product name
      if (pname.value.trim() === '') {
        valid = false;
        pname.classList.add('error');
        document.getElementById('pnameError').style.display = 'block';
      } else {
        pname.classList.add('valid');
      }

      // Validate category
      if (pcat.value === '') {
        valid = false;
        pcat.classList.add('error');
        document.getElementById('pcatError').style.display = 'block';
      } else {
        pcat.classList.add('valid');
      }

      // Validate price
      if (price.value.trim() === '' || parseFloat(price.value) <= 0) {
        valid = false;
        price.classList.add('error');
        document.getElementById('priceError').innerText = 'Please enter a valid price greater than 0.';
        document.getElementById('priceError').style.display = 'block';
      } else {
        price.classList.add('valid');
      }

      // Validate description
      if (pdesc.value.trim() === '') {
        valid = false;
        pdesc.classList.add('error');
        document.getElementById('pdescError').style.display = 'block';
      } else {
        pdesc.classList.add('valid');
      }

      // Validate image
      if (pimg.files.length === 0) {
        valid = false;
        pimg.classList.add('error');
        document.getElementById('pimgError').innerText = 'Please upload a product image.';
        document.getElementById('pimgError').style.display = 'block';
      } else {
        const file = pimg.files[0];
        const maxSize = 2 * 1024 * 1024; // 2MB
        if (file.size > maxSize) {
          valid = false;
          pimg.classList.add('error');
          document.getElementById('pimgError').innerText = 'Image size must be less than 2MB.';
          document.getElementById('pimgError').style.display = 'block';
        } else {
          pimg.classList.add('valid');
        }
      }

      if (!valid) {
        e.preventDefault();
      }
    });
  </script>
</body>
</html>
