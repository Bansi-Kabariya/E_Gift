<?php include 'admin_panel_main.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>manage feedbacks</title>

    <style>
        .section 
        {
            margin-top: 40px; 
            margin-right: 360px;
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
            margin-left: 245px; 
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
        <h2>Manage Feedbacks</h2>
                <table>
                    <tr><th>Name</th><th>Email</th><th>Feedback</th><th>Action</th></tr>
                    <tr>
                        <td>Rahul</td><td>rh@gmail.com</td><td>Love the eco-friendly wrapping!</td>
                        <td><button>Approve</button> <button>Delete</button></td>
                    </tr>
                    <tr>
                        <td>Sneha</td><td>sn@gmail.com</td><td>Fast delivery, thank you!</td>
                        <td><button>Approve</button> <button>Delete</button></td>
                    </tr>
                </table>
            </div>
    </div> 
</body>
</html>