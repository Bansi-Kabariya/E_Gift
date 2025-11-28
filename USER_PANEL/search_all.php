<!-- <?php
include "connection.php";

$search = $_GET['search'];

$sql = "SELECT * FROM department 
        WHERE dept_name LIKE '%$search%' 
        OR dept_description LIKE '%$search%'";

$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
</head>
<body>

<h2>Search Results for: <?php echo htmlspecialchars($search); ?></h2>
<hr>

<?php  
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        echo "
        <div style='margin-bottom:20px;'>
            <h3>{$row['dept_name']}</h3>
            <p>{$row['dept_description']}</p>
        </div>
        <hr>";
    }
} else {
    echo "<p>No results found.</p>";
}
?>

</body>
</html> -->
<?php
include "connection.php";

$search = $_GET['search'];

// PRODUCT SEARCH
$pro = mysqli_query($conn,
    "SELECT * FROM products 
     WHERE name LIKE '%$search%' 
        OR description LIKE '%$search%'"
);

// CATEGORY SEARCH
$cat = mysqli_query($conn,
    "SELECT * FROM categories 
     WHERE category_name LIKE '%$search%'"
);

// DEPARTMENT SEARCH
$dept = mysqli_query($conn,
    "SELECT * FROM department 
     WHERE dept_name LIKE '%$search%' 
        OR dept_description LIKE '%$search%'"
);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Search results for: <b><?php echo htmlspecialchars($search); ?></b></h2>

    <!-- PRODUCTS -->
    <h3 class="text-primary">Products</h3>
    <div class="row">
        <?php
        if (mysqli_num_rows($pro) > 0) {
            while ($p = mysqli_fetch_assoc($pro)) {
                echo "
                <div class='col-md-3 mb-4'>
                    <div class='card shadow-sm'>
                        <img src='product_img/{$p['image']}' class='card-img-top' style='height:200px;object-fit:cover;'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$p['name']}</h5>
                            <p class='card-text'>{$p['description']}</p>
                            <p><b>Price:</b> ₹{$p['price']}</p>
                            <a href='product_details.php?id={$p['id']}' class='btn btn-primary btn-sm'>View</a>
                        </div>
                    </div>
                </div>";
            }
        } else {
            echo "<p>No products found.</p>";
        }
        ?>
    </div>

    <hr>

    <!-- CATEGORIES -->
    <h3 class="text-success">Categories</h3>
    <div class="row">
        <?php
        if (mysqli_num_rows($cat) > 0) {
            while ($c = mysqli_fetch_assoc($cat)) {
                echo "
                <div class='col-md-3 mb-4'>
                    <div class='card shadow-sm p-3'>
                        <h5>{$c['category_name']}</h5>
                    </div>
                </div>";
            }
        } else {
            echo "<p>No categories found.</p>";
        }
        ?>
    </div>

    <hr>

    <!-- DEPARTMENTS -->
    <h3 class="text-warning">Departments</h3>
    <div class="row">
        <?php
        if (mysqli_num_rows($dept) > 0) {
            while ($d = mysqli_fetch_assoc($dept)) {
                echo "
                <div class='col-md-3 mb-4'>
                    <div class='card shadow-sm p-3'>
                        <h5>{$d['dept_name']}</h5>
                        <p>{$d['dept_description']}</p>
                    </div>
                </div>";
            }
        } else {
            echo "<p>No departments found.</p>";
        }
        ?>
    </div>

</div>

</body>
</html>
