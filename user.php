<?php
session_start(); // Start the session at the beginning

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.html'); // Redirect to the login page if not logged in
    exit();
}

$username = $_SESSION['username']; // Get the username from the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>User Login</title>
    
     <!-- Link Swiper's CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
     <link rel="stylesheet" href="swiper-bundle.min.css" />
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="user.css">
    <!-- <link rel="stylesheet" href="menustyle.css"> -->
    <!--Font-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
<!--  -->
<header class="main-header">
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fa-solid fa-bars" id="btn"></i></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
      <header>Welcome</header>
      <a href="#" class="if-active">
        <i class="fas fa-qrcode"></i>
        <span>Home</span>
      </a>
      <a href="profile2.php">
        <i class="fa-solid fa-book"></i>
        <span>Profile</span>
      </a>
      <a href="service.php">
        <i class="fa-solid fa-money-bill"></i>
        <span>Booking</span>
      </a>
      <a href="inbox2.php">
         <i class="fas fa-calendar"></i>
        <span>Inbox</span>
      </a>
      <a href="about.php">
        <i class="far fa-question-circle"></i>
        <span>About</span>
      </a>
     
      <a href="logout.php"> 
        <i class="fa-solid fa-right-from-bracket"></i>
        <span>Log Out</span>
      </a>
    </div>
</header>

<!--  -->
<div class="carousel">
    <div class="list">
       <div class="item" style="background-image: url(image/join.png);">
            <div class="content">
                <div class="title">Choose Package</div>
                <div class="name">Select Service</div>
                <div class="btn">
                    <button>Book</button>
                </div>
            </div>
        </div>

        <div class="item" style="background-image: url(image/car2.jpeg);">
            <div class="content">
                <div class="title">Welcome</div>
                <div class="name"><?php echo htmlspecialchars($username); ?></div>
            </div>
        </div>

        <div class="item" style="background-image: url(image/servis1.jpeg);">
            <div class="content">
                <div class="title">We Provide</div>
                <div class="name">Various Services</div>
            </div>
        </div>

        <div class="item" style="background-image: url(image/carwheel.jpg);">
            <div class="content">
                <div class="title">Full Car Wash</div>
                <div class="name">Service</div>
            </div>
        </div>

        <div class="item" style="background-image: url(image/pack2.jpg);">
            <div class="content">
                <div class="title">Waxing and Polishing</div>
                <div class="name">Service</div>
            </div>
        </div>

        <div class="item" style="background-image: url(image/pack1.png);">
            <div class="content">
                <div class="title">Interior Cleaning</div>
                <div class="name">Service</div>
            </div>
        </div>

        <div class="item" style="background-image: url(image/pack3.jpg);">
            <div class="content">
                <div class="title">Engine Cleaning</div>
                <div class="name">Service</div>
            </div>
        </div>

        <div class="item" style="background-image: url(image/pack5.jpg);">
            <div class="content">
                <div class="title">Disinfection and Sterilization</div>
                <div class="name">Service</div>
            </div>
        </div>

        <div class="item" style="background-image: url(image/carwheel.jpg);">
            <div class="content">
                <div class="title">Rim Coating</div>
                <div class="name">Service</div>
            </div>
        </div>
    </div>

    <!--next prev button-->
    <div class="arrows">
        <button class="prev"><</button>
        <button class="next">></button>
    </div>

    <!-- time running -->
    <div class="timeRunning"></div>
</div>

<!--Footer-->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col">
                <h4>Contact Us</h4>
                <ul>
                    <li><a href="#"><i class="fas fa-envelope"></i> Email</a></li>
                    <li><a href="#"><i class="fab fa-whatsapp"></i> WhatsApp</a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Location</h4>
                <div class="social-links"></div>
            </div>
            <div class="footer-col">
                <h4>Opening Hours</h4>
                <div class="opening-hours">
                    <p>Every Day</p>
                    <p>9:00 AM - 10:00 PM</p> <!-- Example hours, adjust as needed -->
                </div>
            </div>
            <div class="footer-col">
                <h4>Follow Us</h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="footer-bottom">
            <p>© 2024 Mister Car Wash. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<!-- preloader -->
<script src="preloader.js"></script>
<script src="swiper-bundle.min.js"></script>
<script type="module" src="script.js"></script>
<script src="app.js"></script>
</body>
</html>