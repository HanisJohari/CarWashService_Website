<?php
// Include database configuration
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $Service_Name = $_POST['Service_Name'];
    $Service_Price = $_POST['Service_Price'];

    // Prepare the SQL query
    $sql = "INSERT INTO service (Service_Name, Service_Price) VALUES (?, ?)";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        // Bind parameters to the placeholders
        $stmt->bind_param("ss", $Service_Name, $Service_Price);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect to the service page if successful
            header("Location: ServiceCar.php");
        } else {
            // Display an error message if the query fails
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Display an error message if the statement could not be prepared
        echo "Error preparing statement: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
