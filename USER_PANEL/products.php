<?php
include 'header.php';
include 'connection.php';

// Get category id from query
$cat_id = isset($_GET['cat_id']) ? intval($_GET['cat_id']) : 0;

// -------------------- GET CATEGORY NAME FOR HEADING --------------------
$category_name = "Products"; // default heading

if ($cat_id > 0) {
    $cat_stmt = $con->prepare("SELECT c_name FROM category WHERE c_id = ?");
    $cat_stmt->bind_param('i', $cat_id);
    $cat_stmt->execute();
    $cat_result = $cat_stmt->get_result();

    if ($cat_row = $cat_result->fetch_assoc()) {
        $category_name = $cat_row['c_name'];
    }
}

// If no category provided show all products
if ($cat_id <= 0) {
  $stmt = $con->prepare("SELECT product.* , category.c_name FROM product LEFT JOIN category ON product.c_id = category.c_id ORDER BY product.p_id DESC");
  $stmt->execute();
  $prod_result = $stmt->get_result();
} else {
  $stmt = $con->prepare("SELECT product.* , category.c_name FROM product LEFT JOIN category ON product.c_id = category.c_id WHERE product.c_id = ? ORDER BY product.p_id DESC");
  $stmt->bind_param('i', $cat_id);
  $stmt->execute();
  $prod_result = $stmt->get_result();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($category_name); ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>
    body { 
        background: linear-gradient(135deg,#e9f9ef,#f7fffb); 
        font-family: 'Poppins',sans-serif; 
    }
    .section { 
        margin: 120px auto 60px; 
        max-width: 1100px; 
    }
    .card { 
        border-radius: 12px; 
    }
    .card-img-top { 
        height: 220px; 
        object-fit: cover; 
        border-top-left-radius:12px; 
        border-top-right-radius:12px; 
    }
    .card-body { 
        text-align:center; 
    }
    .card-title { 
        color:#0a7a4e; 
        font-weight:700; 
    }
  </style>
</head>
<body>

<div class="container section">
  <div class="row mb-4">
    <div class="col-12 text-center">

      <h3 class="text-success" style="font-weight:700; font-size:35px;"><?= htmlspecialchars($category_name); ?></h3>

    </div>
  </div>

  <div class="row g-4">
    <?php if ($prod_result && $prod_result->num_rows > 0): ?>
      <?php while ($p = $prod_result->fetch_assoc()): ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card h-100">
            
            <img src="<?= '../admin_panel/' . htmlspecialchars($p['p_image_url']); ?>" 
                 class="card-img-top" 
                 alt="<?= htmlspecialchars($p['p_name']); ?>">

            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($p['p_name']); ?></h5>
              <p class="card-text"><?= htmlspecialchars($p['p_desc']); ?></p>
              <p class="fw-bold">₹<?= htmlspecialchars($p['p_price']); ?></p>

              <!-- Add to Cart form -->
              <form method="post" action="cart_action.php" 
                    class="d-flex justify-content-center align-items-center mt-3">
                
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="p_id" value="<?= intval($p['p_id']); ?>">

                <input type="number" name="qty" value="1" min="1" 
                       class="form-control me-3" style="width:100px;">
                
                <button type="submit" class="btn btn-success" style="width:180px;">
                  Add to Cart
                </button>

              </form>

            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <div class="col-12 text-center">
        <h4 class="text-secondary">No products found for this category.</h4>
      </div>
    <?php endif; ?>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include 'footer.php'; ?>