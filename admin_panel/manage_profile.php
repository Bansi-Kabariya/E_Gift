<?php include 'admin_panel_main.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Profiles</title>

    <style>
        .section {
            margin-top: 40px; 
            margin-right: 90px;
            background: white; 
            padding: 20px; 
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
            margin-left: 350px;
        }
        .section h2 {
            margin-bottom: 15px; 
            margin-left: 15px; 
            border-left: 5px solid #2e7d32; 
            padding-left: 10px;
        }
        table {
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 15px;
        }
        table th, table td {
            border: 1px solid #ddd; 
            padding: 10px; 
            text-align: center;
        }
        table th { 
            background: #2e7d32; 
            color: white; 
        }
        button {
            margin-left: 440px;
            padding: 5px 10px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer;
            background: #2e7d32; 
            color: white;
        }
        button:hover { 
            background: #1b5e20; 
        }
    </style>

</head>
<body>
    <div class="section">
        <h2>Manage Profiles
            <a href="add_profile.php">
            </a>
        </h2>

        <table>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Date Created</th>
            </tr>

            <!-- Example Static Data -->
            <tr>
                <td>P001</td>
                <td>Ravi Kumar</td>
                <td>ravi.kumar@example.com</td>
                <td>9876543210</td>
                <td>Delhi, India</td>
                <td>2025-10-01</td>
            </tr>
            <tr>
                <td>P002</td>
                <td>Anjali Sharma</td>
                <td>anjali.sharma@example.com</td>
                <td>9123456789</td>
                <td>Mumbai, India</td>
                <td>2025-10-03</td>
            </tr>
            <tr>
                <td>P003</td>
                <td>Amit Patel</td>
                <td>amit.patel@example.com</td>
                <td>9988776655</td>
                <td>Ahmedabad, India</td>
                <td>2025-10-05</td>
            </tr>
        </table>
    </div>
</body>
</html>
