<?php 
include 'db_connect.php';

if (isset($_GET['STAFF_ID'])) { // Fixed the syntax here
    $STAFF_ID = $_GET['STAFF_ID'];
   
    

    // Corrected the SQL query: "FORM" should be "FROM"
 $sql = "DELETE FROM staff WHERE STAFF_ID = $STAFF_ID";


    if ($conn->query($sql) === TRUE) {
        header("Location: Staff.php");
        exit(); // Added exit() to ensure script stops after redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close(); // Added missing semicolon
}
?>
