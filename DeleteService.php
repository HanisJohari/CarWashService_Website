<?php 
include 'db_connect.php';

if (isset($_GET['id'])) { // Fixed the syntax here
    $id = $_GET['id'];

    // Corrected the SQL query: "FORM" should be "FROM"
 $sql = "DELETE FROM service WHERE Service_Id = $id";


    if ($conn->query($sql) === TRUE) {
        header("Location: ServiceCar.php");
        exit(); // Added exit() to ensure script stops after redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close(); // Added missing semicolon
}
?>