<?php 
include 'header.php';
include 'connection.php'; 

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

  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: linear-gradient(135deg, #e9f9ef, #f7fffb);
        font-family: "Poppins", sans-serif;
        overflow-x: hidden;
    }

    .eco-header {
        text-align: center;
        margin-top: 130px;
        padding: 0 20px;
    }

    .eco-header h4 {
        font-size: 40px;   
        color: #0a7a4e;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .eco-header p {
        font-size: 17px;
        color: #3e3e3e;
        margin-top: 8px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .category-section {
        margin-top: 40px;
         margin-bottom: 70px;
    }

    .category-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        text-align: center;
        transition: 0.3s;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
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
        margin: 0 auto;
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
        font-size: 15px;
    }
</style>

</head>

<body>

<div class="eco-header">
    <h4>🌱Gift Categories</h4>
    <p>
        Explore planet-friendly gift options made from natural, recycled, and handcrafted materials.
    </p>
</div>

<div class="container category-section">
    <div class="row g-4">

        <?php 
        if ($cat_result->num_rows > 0) { 
            while ($cat = $cat_result->fetch_assoc()) { 
        ?>
        
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="category-card" onclick="location.href='products.php?cat_id=<?= $cat['c_id']; ?>'">

                <div class="category-icon">
                    <img src="../admin_panel/uploads/<?= htmlspecialchars($cat['c_img']); ?>" 
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

        <h4 class="text-center" style="color:#0a7a4e; width:100%;">No Categories Added</h4>

        <?php } ?>

    </div>
</div>


<!-- Bootstrap JS (optional, for responsiveness features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php include 'footer.php'; ?>

