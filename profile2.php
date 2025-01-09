<?php
session_start(); // Start the session at the beginning

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.html'); // Redirect to the login page if not logged in
    exit();
}

$firstname = $_SESSION['firstname']; // Get the firstname from the session
$lastname = $_SESSION['lastname']; // Get the lastname from the session
$email = $_SESSION['email']; // Get the email from the session
$username = $_SESSION['username']; // Get the username from the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Profile</title>
    
     <!-- Link Swiper's CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
     <link rel="stylesheet" href="swiper-bundle.min.css" />
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <link rel="stylesheet" href="user.css"> -->
    <link rel="stylesheet" href="profile2style.css">
     
    <!-- Font -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <header class="main-header">
        <input type="checkbox" id="check">
        <label for="check">
          <i class="fa-solid fa-bars" id="btn"></i>
          <i class="fas fa-times" id="cancel"></i>
        </label>
        <div class="sidebar">
          <header>Welcome</header>
          <a href="user.php">
            <i class="fas fa-qrcode"></i>
            <span>Home</span>
          </a>
          <a href="service.php">
            <i class="fa-solid fa-book"></i>
            <span>Booking</span>
          </a>
          <a href="profile2.php" class="if-active">
            <i class="fa-solid fa-money-bill"></i>
            <span>Profile</span>
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

    <div class="wrapper">
      <div class="left">
          <img src="images/car2.png" alt="user" width="100">
          <h4>Welcome to Your Profile Page</h4>
      </div>
      <div class="right">
          <div class="info">
              <h3>Member's Information</h3>
              <div class="info_data">
                   <div class="data">
                      <h4>First Name</h4>
                      <p><?php echo htmlspecialchars($firstname); ?></p>
                   </div>
                   <div class="data">
                     <h4>Last Name</h4>
                      <p><?php echo htmlspecialchars($lastname); ?></p>
                   </div>
              </div>
          </div>
        
        <div class="detail">
              <div class="detail_data">
                   <div class="data">
                      <h4>Email</h4>
                      <p><?php echo htmlspecialchars($email); ?></p>
                   </div>
                   <div class="data">
                     <h4>User Name</h4>
                      <p><?php echo htmlspecialchars($username); ?></p>
                   </div>
              </div>
          </div>
        
           <div class="social_media">
              <ul>
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-thumbs-up"></i></a></li>
                <li><a href="#"><i class="fa-solid fa-heart"></i></a></li>
              </ul>
           </div> 
      </div>
    </div>
</body>
</html>