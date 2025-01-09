<?php
include('db_connect.php'); // Ensure this file defines the $conn variable

if (isset($_GET['delete_id'])) {
    $booking_id = mysqli_real_escape_string($conn, $_GET['delete_id']);

    // Start a transaction to ensure atomicity
    mysqli_begin_transaction($conn);

    try {
        // 1. Delete the service details related to the booking
        $delete_service_query = "DELETE FROM service WHERE SERVICE_ID = (SELECT SERVICE_ID FROM booking WHERE BOOKING_ID = '$booking_id')";
        mysqli_query($conn, $delete_service_query);

        // 2. Delete the payment record related to the booking
        $delete_payment_query = "DELETE FROM payment WHERE BOOKING_ID = '$booking_id'";
        mysqli_query($conn, $delete_payment_query);

        // 3. Delete the car details based on the user_id (this is based on the booking's user_id)
        $delete_car_query = "DELETE FROM car WHERE USER_ID = (SELECT USER_ID FROM booking WHERE BOOKING_ID = '$booking_id')";
        mysqli_query($conn, $delete_car_query);

        // 4. Delete the booking record
        $delete_booking_query = "DELETE FROM booking WHERE BOOKING_ID = '$booking_id'";
        mysqli_query($conn, $delete_booking_query);

        // 5. Delete the package record if no longer referenced
        $delete_package_query = "DELETE FROM package 
                                 WHERE PACKAGE_ID NOT IN (SELECT PACKAGE_ID FROM booking)";
        mysqli_query($conn, $delete_package_query);

        // Commit the transaction if everything is successful
        mysqli_commit($conn);

        // Redirect after successful deletion
        header("Location: inbox2.php");
        exit();
    } catch (Exception $e) {
        // Rollback the transaction if any error occurs
        mysqli_rollback($conn);
        echo "Error: " . $e->getMessage();
    }
}
?>