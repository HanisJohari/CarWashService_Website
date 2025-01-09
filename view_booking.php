<?php
session_start();
include('db_connect.php'); // Ensure this file is correctly included

// Check if booking ID is passed in the URL
if (!isset($_GET['BOOKING_ID'])) {
    die("Error: No booking ID provided.");
}

$booking_id = mysqli_real_escape_string($conn, $_GET['BOOKING_ID']);

// Fetch booking, customer, and car details from the database
$booking_query = "SELECT booking.BOOKING_ID, booking.BOOKING_DATE, booking.TIME_SLOT, booking.BOOKING_STATUS, 
                  CONCAT(user.FIRSTNAME, ' ', user.LASTNAME) AS CUSTOMER_NAME, user.EMAIL, user.CUST_ADDRESS, 
                  car.PLATE_NUM, car.TYPE AS CAR_TYPE, car.CAR_COLOR, 
                  package.PACKAGE_TYPE, payment.PAYMENT_TOTAL_PRICE
                  FROM booking 
                  JOIN user ON booking.USER_ID = user.USER_ID 
                  JOIN car ON booking.USER_ID = car.USER_ID 
                  JOIN package ON booking.PACKAGE_ID = package.PACKAGE_ID 
                  JOIN payment ON booking.BOOKING_ID = payment.BOOKING_ID
                  WHERE booking.BOOKING_ID = '$booking_id'";

$booking_result = mysqli_query($conn, $booking_query);

if ($booking_result && mysqli_num_rows($booking_result) > 0) {
    $booking_row = mysqli_fetch_assoc($booking_result);
} else {
    die("Error fetching booking details: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Receipt</title>
    <link rel="stylesheet" href="view_booking.css">
</head>
<body>
<div class="receipt-container">
    <h2>Booking Receipt</h2>
    <hr>
    <p><strong>Booking ID:</strong> <?= htmlspecialchars($booking_row['BOOKING_ID']) ?></p>
    <p><strong>Booking Date:</strong> <?= htmlspecialchars($booking_row['BOOKING_DATE']) ?></p>
    <p><strong>Booking Time:</strong> <?= htmlspecialchars($booking_row['TIME_SLOT']) ?></p>
    <p><strong>Status:</strong> <?= htmlspecialchars($booking_row['BOOKING_STATUS']) ?></p>

    <hr>
    <h3>Customer Details</h3>
    <p><strong>Name:</strong> <?= htmlspecialchars($booking_row['CUSTOMER_NAME']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($booking_row['EMAIL']) ?></p>
    <p><strong>Address:</strong> <?= htmlspecialchars($booking_row['CUST_ADDRESS']) ?></p>

    <hr>
    <h3>Car Details</h3>
    <p><strong>Plate Number:</strong> <?= htmlspecialchars($booking_row['PLATE_NUM']) ?></p>
    <p><strong>Car Type:</strong> <?= htmlspecialchars($booking_row['CAR_TYPE']) ?></p>
    <p><strong>Car Color:</strong> <?= htmlspecialchars($booking_row['CAR_COLOR']) ?></p>

    <hr>
    <h3>Package Details</h3>
    <p><strong>Package Type:</strong> <?= htmlspecialchars($booking_row['PACKAGE_TYPE']) ?></p>

    <hr>
    <h3>Payment Details</h3>
    <p class="total"><strong>Total Price:</strong> RM <?= htmlspecialchars($booking_row['PAYMENT_TOTAL_PRICE']) ?></p>
    <hr>
    <a href="inbox2.php" class="button">Go Back</a>
</div>
</body>
</html>