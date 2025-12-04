<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <?php include'header.php'; ?>

    <style>
        
        .hero-video 
         {
            width: 85%;
            height: 590px; 
            object-fit: cover;
            margin-top: 90px;
            margin-left: 115px;
        } 
        
    </style>

</head>
<body>
   
    <!-- <video width="100%" height="360"  autoplay loop muted>
        <source src="img/efg.mp4" type="video/mp4">
    </video> -->
    <video class="hero-video" autoplay loop muted>
        <source src="img/efg.mp4" type="video/mp4">
    </video>

<table>
    <tr>
    <td>
        <img src="img/s2.jpg" width="400" height="300">
    </td>
    <td>
        <p><b>Home Page Content for Eco-Friendly Gift Website Hero Section</b>
Welcome to Eco-Friendly Gift , your one-stop destination for thoughtful, sustainable gifts that care for the planet. Our carefully curated collection of eco-friendly products combines style, quality, and environmental responsibility.<br>
 From reusable bottles and jute bags to organic personal care items and beautifully packaged gift boxes, every item is designed to make a difference. <br>
Start your eco-conscious gifting journey today and explore products that bring joy to your loved ones while protecting the Earth.</p>
</td>   
</tr>
    <tr>
        <td>
                <p><b>Our Sustainability Mission</b>
At Eco-Friendly Gift, we believe that every purchase can make a positive impact. Our commitment to sustainability is reflected in every aspect of our business, from using 100% sustainable materials and recycled<br>
 packaging to maintaining carbon-neutral operations wherever possible.<br>
 With every product you purchase, you contribute to a greener, healthier planet, helping reduce waste and support responsible manufacturing practices.</p>
        </td>
        <td>
            <img src="img/s1.jpg" >
        </td>
    </tr>
</table>

      <?php include'footer.php'; ?>
</body>
</html>