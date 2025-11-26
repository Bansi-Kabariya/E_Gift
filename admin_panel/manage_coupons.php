<?php include 'admin_panel_main.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manage coupons</title>

    <style>
        .section 
        {
            margin-top: 40px; 
            margin-right: 385px;
            background: white; 
            padding: 20px; 
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
            margin-left: 350px;
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
            padding: 5px 10px;
            margin-left: 250px;
            border: none; 
            border-radius: 5px; 
            cursor: pointer;
            background: #2e7d32; 
            color: white;
        }
        button:hover 
        { 
            background: #1b5e20; 
        } 
    /* button {
      padding: 8px 15px;
      font-size: 14px;
      cursor: pointer;
      background: #2e7d32;
      color: white;
      border: none;
      border-radius: 5px;
    }
    button:hover 
    { 
        background: #1b5e20; 
    }
       
    .form-popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      border: 2px solid #444;
      background-color: #fff;
      z-index: 9999;
      padding: 20px;
      border-radius: 10px;
      width: 300px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }
    .form-popup input, .form-popup select {
      width: 100%;
      margin: 8px 0;
      padding: 8px;
    }
    .form-popup .btn {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .save-btn {
      background: #007bff;
      color: white;
    }
    .cancel-btn {
      background: #dc3545;
      color: white;
    } */
    </style>

</head>
<body>
    <div class="section">
    <h2>Manage Coupons
    <a href="add_coupon.php">
     <button>+ Add Coupon</button>
    </a>
      <!-- <button onclick="openForm()">+ Add Coupon</button> -->

    </h2>
    <table>
        <tr>
            <th>Coupon ID</th>
            <th>Code</th>
            <th>Discount</th>
            <th>Valid From</th>
            <th>Valid To</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>C001</td>
            <td>WELCOME10</td>
            <td>10% Off</td>
            <td>2025-09-01</td>
            <td>2025-09-30</td>
            <td>Active</td>
        </tr>
        <tr>
            <td>C002</td>
            <td>FESTIVE20</td>
            <td>₹200 Off</td>
            <td>2025-09-05</td>
            <td>2025-09-20</td>
            <td>Expired</td>
        </tr>
        <tr>
            <td>C003</td>
            <td>FIRSTBUY50</td>
            <td>50% Off</td>
            <td>2025-09-01</td>
            <td>2025-12-31</td>
            <td>Active</td>
        </tr>
    </table>
</div>
<!-- <div class="form-popup" id="couponForm"> 
  <h3>Add Coupon</h3>
  <form>
    <input type="text" placeholder="Coupon ID" required>
    <input type="text" placeholder="Code" required>
    <input type="text" placeholder="Discount" required>
    <label>Valid From:</label>
    <input type="date" required>
    <label>Valid To:</label>
    <input type="date" required>
    <select required>
      <option value="">Select Status</option>
      <option value="Active">Active</option>
      <option value="Expired">Expired</option>
    </select>
    <button type="submit" class="btn save-btn">Save</button>
    <button type="button" class="btn cancel-btn" onclick="closeForm()">Cancel</button>
  </form>
</div> 

<script>
  function openForm() {
    document.getElementById("couponForm").style.display = "block";
  }
  function closeForm() {
    document.getElementById("couponForm").style.display = "none";
  }
</script> -->
</body>
</html>