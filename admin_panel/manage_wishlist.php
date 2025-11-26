<?php include 'admin_panel_main.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Wishlist</title>

    <style>
        .section {
            margin-top: 40px; 
            margin-right: 100px;
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
            padding: 5px 10px;  
            border: none; 
            border-radius: 5px; 
            cursor: pointer;
            background: #2e7d32; 
            color: white;
        }

        .btn {
            padding: 5px 10px; 
            margin-left: 510px;
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
        <h2>Manage Wishlist</h2>

        <table>
            <tr>
                <th>User Name</th>
                <th>Email</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Added Date</th>
                <th>Action</th>
            </tr>

            <tr>
                <td>Rahul Sharma</td>
                <td>rahul@gmail.com</td>
                <td>Bamboo Water Bottle</td>
                <td>Eco Utensils</td>
                <td>2025-10-25</td>
                <td><button>View</button> <button>Remove</button></td>
            </tr>
            </tr>

            <tr>
                <td>Sneha Patel</td>
                <td>sneha@gmail.com</td>
                <td>Recycled Paper Gift Box</td>
                <td>Gift Packaging</td>
                <td>2025-10-28</td>
                <td><button>View</button> <button>Remove</button></td>
            </tr>

            <tr>
                <td>Arjun Mehta</td>
                <td>arjunm@gmail.com</td>
                <td>Organic Cotton Tote Bag</td>
                <td>Reusable Bags</td>
                <td>2025-10-30</td>
                <td><button>View</button> <button>Remove</button></td>
            </tr>

            <tr>
                <td>Priya Desai</td>
                <td>priya.d@gmail.com</td>
                <td>Wooden Plant Holder</td>
                <td>Home Decor</td>
                <td>2025-11-01</td>
                <td><button>View</button> <button>Remove</button></td>
            </tr>

            <tr>
                <td>Karan Verma</td>
                <td>karanv@gmail.com</td>
                <td>Seed Paper Greeting Card</td>
                <td>Eco Stationery</td>
                <td>2025-11-02</td>
                <td><button>View</button> <button>Remove</button></td>
            </tr>
        </table>
    </div>
</body>
</html>
