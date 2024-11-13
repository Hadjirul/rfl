<?php
session_start();
include 'navbar.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rfl Eye Care</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .container-fluid {
            height: 90vh; /* Full viewport height */
            display: flex; /* Flexbox for centering */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            background-image: url('images/homepage.jpg'); /* Background image */
            background-size: cover; /* Cover the entire container */
            background-position: center; /* Center the background image */
            padding-bottom: 150px;
        }
        .jumbotron {
            padding: 0; /* Remove default padding */
            margin: 0; /* Remove default margin */
            background-color: rgba(255, 255, 255, 0.7); /* Slight transparency */
            text-align: center; /* Center text */
        }
        .jumbotron h1 {
            font-size: 4rem; /* Increase font size */
        }
        @media (max-width: 768px) {
            .jumbotron h1 {
                font-size: 3rem; /* Smaller size for tablets */
            }
        }
        @media (max-width: 576px) {
            .jumbotron h1 {
                font-size: 2.5rem; /* Even smaller size for mobile */
            }
        }
        /* Doctor's Description Styles */
        .description {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            padding: 50px 20px;
            flex-wrap: wrap;
            margin: 0 auto;
        }
        .paragraph-doc {
            flex: 1;
            margin-right: 20px;
            margin-bottom: 20px;
            margin-left: 20px;
        }
        .paragraph-doc-2 {
            flex: 1;
            text-align: center;
            margin-bottom: 20px;
        }
        .paragraph-doc-2 img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .description-title {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .desc {
            margin-bottom: 15px;
            line-height: 1.5;
        }
        .links a {
            display: block;
            margin: 10px 0;
            color: #007bff;
            text-decoration: none;
        }
        .links a:hover {
            text-decoration: underline;
        }
        /* Services Section */
        .services {
            padding: 50px 20px;
            text-align: center;
            background-color: #f8f9fa;
        }
        .services h2 {
            font-size: 2.5rem;
            margin-bottom: 40px;
            font-weight: bold;
        }
        .service-item {
            margin-bottom: 30px;
        }
        .service-item img {
            width: 400px; /* Increase image width */
            height: 200px; /* Increase image height */
            margin-bottom: 20px;
        }
        .service-item h4 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .service-item p {
            font-size: 1rem;
            color: #6c757d;
        }
        .btn.btn-primary{
            padding-left:50px;
            padding-right:50px;
        }



    

        /* Product Feature Section */
.product-feature {
    padding: 60px 0;
    background-color: #f9f9f9;
 
}

.product-feature h2 {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 40px;
    color: #333;
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Responsive grid */
    gap: 20px;
    padding: 0 20px;
}

.product-item {
    position: relative; /* Needed for overlaying content */
    overflow: hidden; /* Ensures content doesn't overflow */
}

.product-item img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.3s ease; /* Smooth zoom effect on hover */
}

.product-item:hover img {
    transform: scale(1.05); /* Slightly zoom image on hover */
}

.product-info {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent background */
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    opacity: 0; /* Hidden initially */
    transition: opacity 0.3s ease; /* Fade-in effect */
}

.product-item:hover .product-info {
    opacity: 1; /* Show content on hover */
}

.product-info h4 {
    font-size: 1.5rem;
    margin-bottom: 10px;
}

.product-info p {
    font-size: 1rem;
    text-align: center;
    padding: 0 10px;
    line-height: 1.5;
}


    </style>
</head>
  
<body>

<div class="container-fluid">
    <div class="jumbotron bg-transparent">
        <h1>Welcome to RFL Eye Care</h1>
        <p>Providing the best optical care for your eyes</p>
        <a href="pages/appointment.php" class="btn btn-primary">Make an Appointment</a>
    </div>
</div>

<!-- Doctor's Description -->
<section class="description mt-4 animate-on-scroll">
    <div class="paragraph-doc col-lg-6 col-sm-12">
        <h3 class="description-title">Welcome to RFL Visual Care</h3>
        <div class="desc">
            We are a primary care optometry and optical clinic offering comprehensive eye exams, eyecare services, eye wear products, optical dispensing, and contact lenses for all ages.
        </div>
        <div class="links">
            <a href="./page/aboutus.page.php">About Us</a>
            <a href="./page/contactus.page.php">Contact Us</a>
            <a href="./doctor/doctor-branch-1.page.php">Meet Our Doctor</a>
        </div>
    </div>

    <div class="paragraph-doc-2 col-lg-6 col-sm-12">
        <img class="doc-pic img-fluid" src="images/doctor-pic.png" alt="Doctor Picture">
        <h5 style="font-weight:bold; font-size: 1.5em; margin-top: 30px;">Dr. Rosalinda Fernandez Lim</h5>
        <div class="d">Clinical and Comprehensive Optometry</div>
    </div>
</section>

<!-- Services Section -->
<section class="services">
    <h2 class="animate-on-scroll">Our Services</h2>
    <div class="row">
        <div class="col-lg-4 col-md-6 service-item animate-on-scroll">
            <img src="images/service-lens-1.png" alt="Eye Exam" class="img-fluid">
            <h4>Comprehensive Eye Exams</h4>
            <p>Get a thorough evaluation of your eye health and vision needs.</p>
        </div>
        <div class="col-lg-4 col-md-6 service-item animate-on-scroll">
            <img src="images/service-lens-2.png" alt="Contact Lenses" class="img-fluid">
            <h4>Contact Lenses</h4>
            <p>We offer a wide selection of contact lenses for every need.</p>
        </div>
        <div class="col-lg-4 col-md-6 service-item animate-on-scroll">
            <img src="images/service-lens-1.png" alt="Optical Dispensing" class="img-fluid">
            <h4>Optical Dispensing</h4>
            <p>Find the perfect pair of glasses with our expert optical dispensing services.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 service-item animate-on-scroll">
            <img src="images/products-c-l-1.png" alt="Eye Exam" class="img-fluid">
            <h4>Comprehensive Eye Exams</h4>
            <p>Get a thorough evaluation of your eye health and vision needs.</p>
        </div>
        <div class="col-lg-4 col-md-6 service-item animate-on-scroll">
            <img src="images/service-sec-2.png" alt="Contact Lenses" class="img-fluid">
            <h4>Contact Lenses</h4>
            <p>We offer a wide selection of contact lenses for every need.</p>
        </div>
        <div class="col-lg-4 col-md-6 service-item animate-on-scroll">
            <img src="images/service-sec-3.png" alt="Optical Dispensing" class="img-fluid">
            <h4>Optical Dispensing</h4>
            <p>Find the perfect pair of glasses with our expert optical dispensing services.</p>
        </div>
    </div>

    <div class="text-center ">
        <a href="services.page.php" class="btn btn-primary">See More</a>
    </div>
    
</section>

<section class="product-feature">
    <h2 class="">Our Products</h2>
    <div class="product-grid">
        <div class="product-item ">
            <img src="images/products-c-l-1.png" alt="Product 1" class="img-fluid">
            <div class="product-info">
                <h4>Designer Eyewear</h4>
                <p>Discover our wide range of stylish and functional designer eyewear.</p>
            </div>
        </div>
        <div class="product-item ">
            <img src="images/products-c-l-2.png" alt="Product 2" class="img-fluid">
            <div class="product-info">
                <h4>Contact Lenses</h4>
                <p>We offer a variety of comfortable and clear vision contact lenses for all needs.</p>
            </div>
        </div>
        <div class="product-item ">
            <img src="images/products-c-l-3.png" alt="Product 3" class="img-fluid">
            <div class="product-info">
                <h4>Prescription Sunglasses</h4>
                <p>Get UV protection with stylish prescription sunglasses.</p>
            </div>
        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="js/script.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>
