<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Categories - Eco Gift Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2d6e5e5e36.js" crossorigin="anonymous"></script>

    <?php include 'header.php'; ?>

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

        .category-card {
            position: relative;
            background: #ffffff;
            border-radius: 20px;
            padding: 35px 25px;
            text-align: center;
            border: none;
            transition: all 0.35s ease;
            box-shadow:
                8px 8px 18px rgba(0, 0, 0, 0.1),
                -6px -6px 15px rgba(255, 255, 255, 0.7);
            cursor: pointer;

            height: 290px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
        }

        .category-card:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow:
                10px 15px 25px rgba(0, 0, 0, 0.15),
                -6px -6px 18px rgba(255, 255, 255, 0.8);
        }

        .category-icon {
            width: 95px;
            height: 95px;
            border-radius: 50%;
            background: #e4faef;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 18px;
            overflow: hidden;
            box-shadow:
                inset 5px 5px 12px rgba(0, 0, 0, 0.1),
                inset -5px -5px 12px rgba(255, 255, 255, 0.7);
        }

        .category-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.3s ease;
        }

        .category-card:hover .category-icon img {
            transform: scale(1.15);
        }

        .category-name {
            font-size: 22px;
            font-weight: 700;
            color: #006a43;
            margin-top: 10px;
        }

        .category-desc {
            color: #4a4a4a;
            font-size: 15px;
            margin-top: 10px;
            padding: 0 10px;
        }

        .category-section {
            margin-top: 50px;
            padding-bottom: 50px;
        }
    </style>

</head>

<body>

    <div class="eco-header">
        <h4>🌱Gift Categories</h4>
        <p>
            Explore planet-friendly gift options made from natural, recycled, and handcrafted materials.
        </p>
        <br>
    </div>

    <div class="container category-section">
        <div class="row g-4">

            <div class="col-lg-4 col-md-6">
                <div class="category-card" onclick="location.href='products.php?cat=recycled'">
                    <div class="category-icon">
                        <img src="./img/img1.webp" alt="Recycled">
                    </div>
                    <div class="category-name">Skin Care</div>
                    <div class="category-desc">Gifts crafted from reused & renewed eco materials.</div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="category-card" onclick="location.href='products.php?cat=plants'">
                    <div class="category-icon">
                        <img src="./img/img7.jpg" alt="Plant Gifts">
                    </div>
                    <div class="category-name">Sass Bar Handmade Soap</div>
                    <div class="category-desc">Fresh plants & saplings that bring life to every space.</div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="category-card" onclick="location.href='products.php?cat=organic'">
                    <div class="category-icon">
                        <img src="./img/img4.webp" alt="Organic">
                    </div>
                    <div class="category-name">Crochet Items</div>
                    <div class="category-desc">Pure, chemical-free gifts made from organic materials.</div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="category-card" onclick="location.href='products.php?cat=personalized'">
                    <div class="category-icon">
                        <img src="./img/img5.webp" alt="Personalized Gifts">
                    </div>
                    <div class="category-name">Wall Decor</div>
                    <div class="category-desc">Eco-friendly items designed specially for your loved ones.</div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="category-card" onclick="location.href='products.php?cat=jute'">
                    <div class="category-icon">
                        <img src="./img/img6.webp" alt="Jute Items">
                    </div>
                    <div class="category-name">Jute & Cotton Items</div>
                    <div class="category-desc">Reusable natural-fiber bags & accessories.</div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="category-card" onclick="location.href='products.php?cat=organic'">
                    <div class="category-icon">
                        <img src="./img/img4.webp" alt="Organic">
                    </div>
                    <div class="category-name">Wooden Games</div>
                    <div class="category-desc">Pure, chemical-free gifts made from organic materials.</div>
                </div>
            </div>

            <br>
            <div class="col-12 text-center mt-5 mb-4">
                <h4 style="color: #0a7a4e; font-weight: 700; font-size: 40px;">🎁 Gift Hamper's</h4>
            </div>
            <br>

            <div class="col-lg-6 col-md-6">
                <div class="category-card" onclick="location.href='products.php?cat=personalized'">
                    <div class="category-icon">
                        <img src="./img/img5.webp" alt="Personalized Gifts">
                    </div>
                    <div class="category-name">Kitchen Gift Hamper</div>
                    <div class="category-desc">Eco-friendly items designed specially for your loved ones.</div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="category-card" onclick="location.href='products.php?cat=jute'">
                    <div class="category-icon">
                        <img src="./img/img6.webp" alt="Jute Items">
                    </div>
                    <div class="category-name">Stationary Gift Hamper</div>
                    <div class="category-desc">Reusable natural-fiber bags & accessories.</div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="category-card" onclick="location.href='products.php?cat=jute'">
                    <div class="category-icon">
                        <img src="./img/img6.webp" alt="Jute Items">
                    </div>
                    <div class="category-name">Personal Care Gift Hamper</div>
                    <div class="category-desc">Reusable natural-fiber bags & accessories.</div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="category-card" onclick="location.href='products.php?cat=jute'">
                    <div class="category-icon">
                        <img src="./img/img6.webp" alt="Jute Items">
                    </div>
                    <div class="category-name">Travelling Gift Hamper</div>
                    <div class="category-desc">Reusable natural-fiber bags & accessories.</div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

 <?php include 'footer.php'; ?>