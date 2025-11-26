<?php include 'admin_panel_main.php'; ?>

<?php
// Dummy data (replace with DB queries later)
$totalProducts = 120;
$totalOrders   = 89;
$totalUsers    = 45;
//$totalRevenue  = 150000;
$pendingOrders = 12;
$Feedback   = 8;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .cards {
            display: grid; grid-template-columns: repeat(auto-fit,minmax(220px,1fr));
            gap: 20px; margin-top: 20px;
        }
        .card 
        {
            background: white; 
            border-radius: 10px; 
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15); 
            text-align: center; 
            transition: transform 0.3s;
        }
        .card:hover 
        { 
            transform: translateY(-5px); 
        }
        .card h3 
        { 
            font-size: 20px; 
            margin-bottom: 10px; 
        }
        .card p 
        { 
            font-size: 18px; 
            font-weight: bold; 
            color: #2e7d32; 
        }
    </style>
</head>
<body>
        <div class="content">
            <h2>Dashboard Overview</h2>
            <div class="cards">
                <div class="card"><h3>Total Products</h3><p><?php echo $totalProducts; ?></p></div>
                <div class="card"><h3>Total Orders</h3><p><?php echo $totalOrders; ?></p></div>
                <div class="card"><h3>Total Customers</h3><p><?php echo $totalUsers; ?></p></div>
                <!-- <div class="card"><h3>Total Revenue</h3><p>₹<?php echo number_format($totalRevenue); ?></p></div> -->
                <div class="card"><h3>Pending Orders</h3><p><?php echo $pendingOrders; ?></p></div>
                <div class="card"><h3>Feedback</h3><p><?php echo $Feedback; ?></p></div>
            </div>
        
        </div>
</body>
</html>