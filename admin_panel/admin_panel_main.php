<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Echo Friendly Gift Shop</title>

  <style>
    body { 
      margin: 0; 
      font-family: "Segoe UI", sans-serif; 
      background-color: #f5f3ef; 
      color: #333; 
      padding-top: 70px; 
    }

    header {
      background: linear-gradient(135deg, #3a5a40, #6b4226); /* green-brown mix */
      color: white; 
      padding: 15px 20px;
      font-size: 22px; 
      font-weight: bold; 
      letter-spacing: 1px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center; 
    }

    .header-left {
      position: absolute;   
      left: 10px;
    }

    .header-left img {
      height: 50px; 
      width: auto;
      margin-top: 5px;
    }

    .header-center {
      flex: 1;
      text-align: center; 
    }

    .container { 
      display: flex; 
    }

    .sidebar {
      width: 230px; 
      background: linear-gradient(180deg, #2e7d32, #5a3c2c); /* earthy gradient */
      height: 100vh; 
      color: white;
      position: fixed; 
      left: 0; 
      top: 60px; 
      padding-top: 20px;
      box-shadow: 2px 0 6px rgba(0,0,0,0.15);
    }

    .sidebar a {
      display: block; 
      padding: 12px 20px; 
      color: white; 
      text-decoration: none; 
      transition: 0.3s;
    }

    .sidebar a:hover { 
      background: rgba(90, 60, 44, 0.9); /* brown hover */
    }

    .content { 
      margin-left: 230px; 
      padding: 20px; 
      flex: 1; 
    }

    /* Dropdown */
    .dropdown {
      position: relative;
    }

    .dropdown-content {
      display: none;
      background: #4b6043; /* mossy green */
    }

    .dropdown-content a {
      padding: 10px 40px;
      font-size: 14px;
      background: #4b6043;
    }

    .dropdown-content a:hover {
      background: #6b4226; /* earthy brown */
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
</head>
<body>

<header>
  <div class="header-left">
    <img src="images/logo.png" alt="Logo">
  </div>
  <div class="header-center">
    🌿 Echo Friendly Gift System - Admin Panel
  </div>
</header>

<div class="container">
  <div class="sidebar">
    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="manage_products.php">📦 Manage Products</a>
    <a href="manage_orders.php">🛒 Manage Orders</a>
    <a href="manage_users.php">👥 Users</a>
    <a href="manage_feedbacks.php">💬 Feedbacks</a>
    <a href="manage_wishlist.php">💚 Wishlist</a>
    <a href="manage_payment.php">💳 Payments</a>
    <a href="manage_coupons.php">🎟 Coupons</a>

    <div class="dropdown">
      <a href="#">⚙️ Admin Settings ▾</a>
      <div class="dropdown-content">
        <a href="edit_about.php">✏️ Edit About Us</a>
        <a href="edit_contact.php">📞 Edit Contact Us</a>
      </div>
    </div>

    <a href="logout.php">🚪 Logout</a>
  </div>
</div>

</body>
</html>
