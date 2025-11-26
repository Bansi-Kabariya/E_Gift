<?php include 'admin_panel_main.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manage_orders</title>

    <style>
        .section 
        {
            margin-top: 40px; 
            margin-right: 470px;
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
            border: none; 
            border-radius: 5px; 
            cursor: pointer;
            background: #2e7d32; 
            color: white;
        }
        .btn
        {
            padding: 5px 10px;
            margin-left: 200px; 
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
    </style>
</head>
<body>
    <div class="section">
        <h2>Manage Orders
            <a href="add_order.php">
            </a>
        </h2>
            <table>
                <tr><th>Order ID</th><th>Customer</th><th>Total</th><th>Status</th><th>Action</th></tr>
                <tr>
                    <td>#1001</td><td>Ravi Kumar</td><td>₹1200</td><td>Pending</td>
                    <td><button>Mark Shipped</button></td>
                </tr>
                <tr>
                    <td>#1002</td><td>Anjali Sharma</td><td>₹850</td><td>Delivered</td>
                    <td><button disabled>Completed</button></td>
                </tr>
            </table>
    </div> 
</body>
</html>
