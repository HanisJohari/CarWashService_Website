<?php
include 'db_connect.php';

// Initialize $row to avoid undefined variable error
$row = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ensure the column name matches the one in your database
    $sql = "SELECT * FROM team WHERE TEAM_ID = $id";  // Adjust column name if necessary
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
    $TEAM_NAME = $conn->real_escape_string($_POST['TEAM_NAME']);
    $TEAM_STATUS = $conn->real_escape_string($_POST['TEAM_STATUS']);

    // Get the ID from the GET parameter
    $id = $_GET['id'];

    // SQL query to update the team table
    $sql = "UPDATE team SET TEAM_NAME='$TEAM_NAME', TEAM_STATUS='$TEAM_STATUS' WHERE TEAM_ID=$id"; // Ensure the column name is correct

    if ($conn->query($sql) === TRUE) {
        header("Location: Team.php");
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
    <title>Team Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center"> Update Team</h2>
        <div class="mt-4">
            <?php if ($row): ?>
                <form action="updateTeam.php?id=<?php echo $id; ?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="TEAM_NAME">Team Name</label>
                            <input type="text" class="form-control" name="TEAM_NAME" id="TEAM_NAME" value="<?php echo isset($row['TEAM_NAME']) ? htmlspecialchars($row['TEAM_NAME']) : ''; ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="TEAM_STATUS">Team Status</label>
                            <select class="form-control" name="TEAM_STATUS" id="TEAM_STATUS" required>
                                <option value="Active" <?php echo ($row['TEAM_STATUS'] == 'Active') ? 'selected' : ''; ?>>Active</option>
                                <option value="Inactive" <?php echo ($row['TEAM_STATUS'] == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Team</button>
                </form>
            <?php else: ?>
                <p>No team record found to update.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
