
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Landing Page</title>
    
     <!-- Link Swiper's CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
     <link rel="stylesheet" href="swiper-bundle.min.css" />
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="user.css">
    <!--Font-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- mobile meta -->
  
</head>
<body>


<!-- side bar -->

<header class="main-header">
        <input type="checkbox" id="check">
        <label for="check">
          <i class="fa-solid fa-bars" id="btn"></i></i>
          <i class="fas fa-times" id="cancel"></i>
        </label>
        <div class="sidebar">
          <header>Welcome</header>
          <a href="user.php" >
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
          <a href="about.php" class="if-active">
            <i class="far fa-question-circle"></i>
            <span>About</span>
          </a>
         
          <a href="logout.php"> <!-- Logout sini-->
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Log Out</span>
          </a>
        </div>
    

    </header>
    

            <section class="hero">
                    <div class="heading">
                            <h1>About US</h1>
                    </div>
                    <div class="container">

                            <div class="hero-content">

                                    <h2>Welcome to our Website</h2>
                                    <p> Founded in Houston, Texas in 1969, Arizona headquartered Mister Car Wash is the largest car wash chain in the United States. With over 476 locations across more than 20 states and over 6,750 employees, Mister Car Wash has partnered with several private equity firms, including ONCAP in the past, and currently Leonard Green & Partners. Mister Car Wash is constantly adding new locations under its brand through the acquisition and transition of existing businesses and the construction of greenfield sites alike</p>
                                    <!-- <button class="cta-button">Read more</button> -->
                            </div>
                            <div class="hero-image">

                               <img src="image/car.jpg" alt=""> 
                            </div>

                    </div>


            </section>


            <section class="gallery-section">

                    <div class="gallery-heading">
                        <h1>Our gallery</h1>
                    </div>
                    
                    <div class="img-gallery">

                        <img src="image/homewash1.jpg" alt="">
                        <img src="image/homewash2.jpg" alt="">
                        <img src="image/car1.jpg" alt="">
                        <img src="image/car1.jpg" alt="">
                        <img src="image/car1.jpg" alt="">
                    </div>

            </section>

</body>

</html>