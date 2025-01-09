<?php
// Include database configuration
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $Team_Name = $_POST['TEAM_NAME'];
    $Team_Status = $_POST['TEAM_STATUS'];

    // Prepare the SQL query
    $sql = "INSERT INTO team (Team_Name, Team_Status) VALUES (?, ?)";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        // Bind parameters to the placeholders
        $stmt->bind_param("ss", $Team_Name, $Team_Status);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect to the index page if successful
            header("Location: Team.php");
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
