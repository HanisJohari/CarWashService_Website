<?php
// update_status.php

include('db_connect.php');  // Database connection

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['BOOKING_ID'])) {
    $bookingId = $_POST['BOOKING_ID'];

    // Prepare SQL to update the booking status
    $sql = "UPDATE booking SET booking_status = 'Confirm' WHERE BOOKING_ID = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        // If there's an error preparing the statement, output the error
        echo "Error in preparing statement: " . $conn->error;
        exit;
    }

    $stmt->bind_param('i', $bookingId);

    if ($stmt->execute()) {
        echo 'Status updated successfully!';
    } else {
        // If there is an error executing the query, print it
        echo 'Error updating status: ' . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Error: Booking ID is not set.";
}
?>