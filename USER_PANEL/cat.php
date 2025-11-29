<?php 
//include 'header.php';
include 'connection.php'; // DB connection file

// Fetch all categories from DB
$cat_sql = "SELECT * FROM category";
$cat_result = $con->query($cat_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Categories</title>

<style>
/* ------- your existing card design -------- */
.category-section {
    margin-top: 40px;
}

.category-card {
    background: white;
    border-radius: 15px;
    padding: 25px;
    text-align: center;
    transition: 0.3s;
    cursor: pointer;
}

.category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.category-icon img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 50%;
}

.category-name {
    font-size: 22px;
    margin-top: 15px;
    font-weight: bold;
    color: #0a7a4e;
}

.category-desc {
    color: #555;
    margin-top: 10px;
}
</style>

</head>

<body>

<!-- CATEGORY LIST -->
<div class="container category-section">
    <div class="row g-4">

        <?php 
        if ($cat_result->num_rows > 0) { 
            while ($cat = $cat_result->fetch_assoc()) { 
        ?>
        
        <!-- DYNAMIC CATEGORY CARD -->
        <div class="col-lg-4 col-md-6">
            <div class="category-card" onclick="location.href='products.php?cat_id=<?= $cat['cat_id']; ?>'">

                <div class="category-icon">
                    <img src="uploads/<?= htmlspecialchars($cat['c_img']); ?>" 
                         alt="<?= htmlspecialchars($cat['c_name']); ?>">
                </div>

                <div class="category-name">
                    <?= htmlspecialchars($cat['c_name']); ?>
                </div>

                <div class="category-desc">
                    <?= htmlspecialchars($cat['c_desc']); ?>
                </div>

            </div>
        </div>

        <?php 
            } 
        } else { 
        ?>

        <h4 class="text-center" style="color:#0a7a4e;">No Categories Added</h4>

        <?php } ?>

    </div>
</div>

</body>
</html>
