<?php

include("./connection/config.php");

$con = connection();
$status_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $con->prepare("INSERT INTO vaporwave_messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        header("Location: index.php#contact");
        exit();
    } else {
        $status_message = "<div class='alert alert-danger mt-3'>Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaporwave Merch Co.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

<nav class="nav justify-content-center sticky-top text-dark" style="background-color: #ff00ff; color: #120136; font-weight: bold;">
  <a class="nav-link active text-dark" aria-current="page" href="#home">Home</a>
  <a class="nav-link text-dark" href="#services">Services</a>
  <a class="nav-link text-dark" href="#products">Products</a>
  <a class="nav-link text-dark" href="#about">About us</a>
  <a class="nav-link text-dark" href="#contact">Contact us</a>
</nav>

<section id=home class="py-5 bg-dark text-white text-center" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ2qmFdbvf8W3RPHMkgXwrbXNG4ah5vuGs1AuV5V5rPXXloI83C5NWRALFB&s=10');">
    <div class="container">
    <h1>WELCOME TO AESTHETIC REALM</h1>
    <p class="lead">Your home for 80s nostalgia, synthwave gear, and retro apparel.</p>
    <a href="#products" class="btn btn-primary" style="background-color: #ff00ff; color: #120136; font-weight: bold;">Shop Now</a>
</div>
</section>

<section id="services" class="py-5">
    <div class="container">
        <div class="row text-center mt-4">
            <div class="col-md-4">
                <h3>Custom Apparel</h3>
                <p>Retro 80s aesthetic shirts, hoodies, and jackets designed in-house.</p>
            </div>
            <div class="col-md-4">
                <h3>Express Shipping</h3>
                <p>Fast worldwide delivery so your gear arrives before the sunset fades.</p>
            </div>
            <div class="col-md-4">
                <h3>Synthware & Accessories</h3>
                <p>Cassette tapes, keychains, and retro hardware for true enthusiasts.</p>
            </div>
        </div>
    </div>
</section>

<section id="products" class="py-5">
    <div class ="container">
        <div class="row text-center mt-4">
            <h2 class="text-center mb-4 text-white">Featured Products</h2>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://vapor95.com/cdn/shop/files/sunsetfrontBOMBER.png?v=1768187719&width=960" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Sunset Supercassette Bomber Jacket</h5>
                        <p class="card-text">$25.00 - Premium cotton.</p>
                        <a href="#" class="btn btn-dark"> Buy now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://vapor95.com/cdn/shop/products/DriftLegendBOMBER-Front.png?v=1678924912&width=960" class="card-img-top" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Drift Legend Bomber Jacket</h5>
                        <p class="card-text">$25.00 - Premium cotton.</p>
                        <a href="#" class="btn btn-dark"> Buy now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="https://vapor95.com/cdn/shop/products/KyotoPastel-BomberJacketFront.png?v=1715769299&width=960" class="card-img-top" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Kyoto Koi Bomber Jacket</h5>
                        <p class="card-text">$25.00 - Premium.</p>
                        <a href="#" class="btn btn-dark"> Buy now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">About Vaporwave Merch Co.</h2>
        <div class="row align-items-center">
            <div class="col-md-6 text-center">
                <p>Vaporwave clothing is a wearable manifestation of early internet nostalgia, blending a surreal 1980s and 90s aesthetic with modern streetwear. The visual vision is heavily anchored in a distinct color palette dominated by pastel pinks, neon purples, and vibrant teals, contrasted against stark black-and-white checkerboard patterns.</p>
            </div>
            <div class="col-md-6">
                <img src="https://www.shutterstock.com/blog/wp-content/uploads/sites/5/2021/11/Vaporwave-Collage2-1.jpg?w=720" class="img-fluid rounded shadow" alt="About Us">
            </div>
        </div>
    </div>
</section>

<section id=contact class="py-5 bg-dark" style="background-image: url('https://img.magnific.com/free-vector/dark-background-with-purple-squares_1053-430.jpg');">
    <div class="container">
        <h2 class="text-center mb-4 text-white">Contact Us</h2> 
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="index.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="text-white">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="text-white">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="text-white">Message</label>
                        <textarea type="text" class="form-control" name="message" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn w-100 mt-3" style="background-color: #ff00ff; color: #120136; font-weight: bold;">Send Message</button>
                    </div>
                </form>
            </div>
        </div>       
    </div>
</section>

<footer class="bg-info text-white text-center py-4">
    <div class="container">
        <p class="mb-0">&copy; 2026 Vaporwave Merch Co. All rights reserved.</p>
        <p class="small text-secondary mt-1">Aesthetic vibes only.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>