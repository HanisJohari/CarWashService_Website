<?php
include('db_connect.php');

// Ensure a valid connection
if ($conn) {
    // Define your query
    $query = "SELECT BOOKING_ID, BOOKING_DATE, TIME_SLOT, BOOKING_STATUS FROM booking";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
} else {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Inbox</title>
    
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="swiper-bundle.min.css" />
    <link rel="stylesheet" href="user.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <!-- table -->
    <style>
        table {
            margin: 0 auto; /* Centers the table horizontally */
            border-collapse: collapse; /* Optional: Makes the borders cleaner */
            margin-top: 30px;
        }

        body {
            background-color: rgb(250, 250, 251);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
        }

        /* Container */
        .inbox-container {
            width: 80%;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }

        /* Title */
        .inbox-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #ff3b3b; /* Red for title */
            margin-bottom: 20px;
        }

        /* Table */
        .inbox-table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }

        .inbox-table thead {
            background-color: rgb(159, 18, 18); /* Green header */
            color: white;
        }

        .inbox-table th, .inbox-table td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        /* Buttons */
        button {
            background-color: rgb(221, 85, 85);
            border: none;
            color: white;
            padding: 8px 12px;
            margin: 2px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }

        /* Links */
        a {
            text-decoration: none;
        }

        a button {
            display: inline-block;
        }
    </style>
</head>
<body>
<header class="main-header">
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fa-solid fa-bars" id="btn"></i></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
        <header>Welcome</header>
        <a href="user.php">
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
        <a href="inbox2.php" class="if-active">
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

<div class="inbox-container">
    <h1 class="inbox-title">Booking History</h1>
    <table class="inbox-table">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if there are bookings to display
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$row['BOOKING_ID']}</td>
                        <td>{$row['BOOKING_DATE']}</td>
                        <td>{$row['TIME_SLOT']}</td>
                        <td>{$row['BOOKING_STATUS']}</td>
                        <td>
                            <a href='update_booking.php?BOOKING_ID={$row['BOOKING_ID']}'><button>Update Details</button></a>
                            <a href='delete_booking.php?delete_id={$row['BOOKING_ID']}' onclick=\"return confirm('Are you sure you want to delete this booking?');\">
                                <button>Cancel Booking</button></a>
                            <a href='view_booking.php?BOOKING_ID={$row['BOOKING_ID']}'>
                                <button>View</button></a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No bookings found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>