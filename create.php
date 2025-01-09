<?php
// Include database configuration
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $STAFF_FNAME = $_POST['STAFF_FNAME'] ?? null;
    $STAFF_LNAME = $_POST['STAFF_LNAME'] ?? null;
    $STAFF_GENDER = $_POST['STAFF_GENDER'] ?? null;
    $STAFF_CONTACT = $_POST['STAFF_CONTACT'] ?? null;
    $TEAM_ID = $_POST['TEAM_ID'] ?? null; // Get the selected TEAM_ID

    // Debugging: Print values
    echo "STAFF_FNAME: " . $STAFF_FNAME . "<br>";
    echo "STAFF_LNAME: " . $STAFF_LNAME . "<br>";
    echo "STAFF_GENDER: " . $STAFF_GENDER . "<br>";
    echo "STAFF_CONTACT: " . $STAFF_CONTACT . "<br>";
    echo "TEAM_ID: " . $TEAM_ID . "<br>";

    if ($STAFF_FNAME && $STAFF_LNAME && $STAFF_GENDER && $STAFF_CONTACT && $TEAM_ID) {
        // Prepare the SQL query to include TEAM_ID
        $sql = "INSERT INTO STAFF (STAFF_FNAME, STAFF_LNAME, STAFF_GENDER, STAFF_CONTACT, TEAM_ID) 
                VALUES (?, ?, ?, ?, ?)";
        
        // Prepare the statement
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            // Bind parameters to the placeholders
            $stmt->bind_param("ssssi", $STAFF_FNAME, $STAFF_LNAME, $STAFF_GENDER, $STAFF_CONTACT, $TEAM_ID);

            // Execute the query
            if ($stmt->execute()) {
                // Redirect to the index page if successful
                header("Location: ViewStaff.php");
                exit;
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
    } else {
        echo "All fields are required.";
    }

    // Close the database connection
    $conn->close();
}
?>