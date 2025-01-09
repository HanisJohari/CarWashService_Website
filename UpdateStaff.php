<?php
include 'db_connect.php';

// Initialize $row to avoid undefined variable error
$row = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ensure the column name matches the one in your database
    $sql = "SELECT * FROM staff WHERE staff_id = $id";  // Adjust column name if necessary
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
    $Staff_Fname = $conn->real_escape_string($_POST['Staff_Fname']);
    $Staff_Lname = $conn->real_escape_string($_POST['Staff_Lname']);
    $Staff_Gender = $conn->real_escape_string($_POST['Staff_Gender']);
    $Staff_Contact = $conn->real_escape_string($_POST['Staff_Contact']);
    $Team_Id = $conn->real_escape_string($_POST['Team_Id']);  // Capture the Team_Id

    // Get the ID from the GET parameter
    $id = $_GET['id'];

    // SQL query to update the staff table
    $sql = "UPDATE staff SET Staff_Fname='$Staff_Fname', Staff_Lname='$Staff_Lname', Staff_Gender='$Staff_Gender', Staff_Contact='$Staff_Contact', Team_Id='$Team_Id' WHERE staff_id=$id"; // Ensure the column name is correct

    if ($conn->query($sql) === TRUE) {
        header("Location: Staff.php");
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
        <h2 class="text-center"> Update Staff</h2>
        <div class="mt-4">
            <?php if ($row): ?>
                <form action="UpdateStaff.php?id=<?php echo $id; ?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Staff_Fname">First Name</label>
                            <input type="text" class="form-control" name="Staff_Fname" id="Staff_Fname" value="<?php echo isset($row['Staff_Fname']) ? htmlspecialchars($row['Staff_Fname']) : ''; ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Staff_Lname">Last Name</label>
                            <input type="text" class="form-control" name="Staff_Lname" id="Staff_Lname" value="<?php echo isset($row['Staff_Lname']) ? htmlspecialchars($row['Staff_Lname']) : ''; ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Staff_Gender">Gender</label>
                            <input type="text" class="form-control" name="Staff_Gender" id="Staff_Gender" value="<?php echo isset($row['Staff_Gender']) ? htmlspecialchars($row['Staff_Gender']) : ''; ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Staff_Contact">Contact</label>
                            <input type="text" class="form-control" name="Staff_Contact" id="Staff_Contact" value="<?php echo isset($row['Staff_Contact']) ? htmlspecialchars($row['Staff_Contact']) : ''; ?>" required>
                        </div>
                        <div class="form-group col-md-4">
    <label for="Team_Id">Team</label>
    <select class="form-control" name="Team_Id" id="Team_Id" required>
        <option value="">Select Team</option>
        <?php 
        include 'db_connect.php';
        if ($conn) {
            $sql = "SELECT Team_Id, Team_Name FROM team";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($team = $result->fetch_assoc()) {
                    // Check if this team is the current team
                    $selected = ($team['Team_Id'] == $row['Team_Id']) ? 'selected' : '';
                    echo "<option value='{$team['Team_Id']}' $selected>{$team['Team_Name']}</option>";
                }
            } else {
                echo "<option value=''>No teams available</option>";
            }
        }
        ?>
    </select>
</div>

                    </div>
                    <button type="submit" class="btn btn-primary">Update User</button>
                </form>
            <?php else: ?>
                <p>No staff record found to update.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
