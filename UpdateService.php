<?php
include 'db_connect.php';

// Initialize $row to avoid undefined variable error
$row = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ensure the column name matches the one in your database
    $sql = "SELECT * FROM service WHERE Service_Id = $id";  // Adjust column name if necessary
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch row if found
    } else {
        echo "No record found.";
        exit; // Exit if no record is found
    }
}

// Handling form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
    // Retrieve form data and escape user inputs to prevent SQL injection
    $Service_Name = $conn->real_escape_string($_POST['Service_Name']);
    $Service_Price = $conn->real_escape_string($_POST['Service_Price']);

    // Get the ID from the GET parameter
    $id = $_GET['id'];

    // SQL query to update the staff table
    $sql = "UPDATE service SET Service_Name='$Service_Name', Service_Price='$Service_Price' WHERE Service_Id=$id"; // Ensure the column name is correct

    if ($conn->query($sql) === TRUE) {
        header("Location: ServiceCar.php");
        exit(); // Ensure no further code is executed after redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center"> Update Service</h2>
        <div class="mt-4">
            <?php if ($row): ?>
                <form action="updateService.php?id=<?php echo $id; ?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Service_Name">Service Name</label>
                            <input type="text" class="form-control" name="Service_Name" id="Service_Name" value="<?php echo isset($row['Service_Name']) ? htmlspecialchars($row['Service_Name']) : ''; ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Service_Price">Service_Price</label>
                            <input type="text" class="form-control" name="Service_Price" id="Service_Price" value="<?php echo isset($row['Service_Price']) ? htmlspecialchars($row['Service_Price']) : ''; ?>" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Service</button>
                </form>
            <?php else: ?>
                <p>No service record found to update.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
