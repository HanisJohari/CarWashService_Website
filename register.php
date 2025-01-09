<?php
include('db_connect.php');

// Initialize variables
$USERNAME = "";
$EMAIL = "";
$FIRSTNAME = "";
$LASTNAME = "";
$CUST_ADDRESS = "";
$TEAM_ID = 3; // Set a default TEAM_ID or fetch it from the database based on the admin's decision
$errors = array(); // Initialize errors array

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $FIRSTNAME = $_POST['firstname'];
    $LASTNAME = $_POST['lastname'];
    $USERNAME = $_POST['username'];
    $CUST_ADDRESS = $_POST['address'];
    $EMAIL = $_POST['email'];
    $PASSWORD_1 = $_POST['password_1'];
    $PASSWORD_2 = $_POST['password_2'];

    // Form validation
    if (empty($FIRSTNAME)) { array_push($errors, "First name is required"); }
    if (empty($LASTNAME)) { array_push($errors, "Last name is required"); }
    if (empty($USERNAME)) { array_push($errors, "Username is required"); }
    if (empty($CUST_ADDRESS)) { array_push($errors, "Address is required"); }
    if (empty($EMAIL)) { array_push($errors, "Email is required"); }
    if (empty($PASSWORD_1)) { array_push($errors, "Password is required"); }
    if ($PASSWORD_1 != $PASSWORD_2) { array_push($errors, "Passwords do not match"); }

    // Check if TEAM_ID exists in the team table (optional, if you want to validate the TEAM_ID)
    $team_check_query = "SELECT * FROM team WHERE TEAM_ID='$TEAM_ID' LIMIT 1";
    $result = mysqli_query($conn, $team_check_query);
    if (mysqli_num_rows($result) == 0) {
        array_push($errors, "Invalid Team ID");
    }

    // Check if there are no errors before inserting into database
    if (count($errors) == 0) {
        // Insert data into the database without encrypting the password
        $query = "INSERT INTO user (FIRSTNAME, LASTNAME, USERNAME,CUST_ADDRESS, EMAIL, PASSWORD, TEAM_ID) 
                  VALUES ('$FIRSTNAME', '$LASTNAME', '$USERNAME','$CUST_ADDRESS', '$EMAIL', '$PASSWORD_1', '$TEAM_ID')";

        // Execute the query
        if (mysqli_query($conn, $query)) {
            // Redirect to login page or another page
            $_SESSION['FIRSTNAME']=$FIRSTNAME;
            $_SESSION['LASTNAME']=$LASTNAME;
            $_SESSION['USERNAME']=$USERNAME;
            $_SESSION['CUST_ADDRESS']=$CUST_ADDRESS;
            $_SESSION['EMAIL']=$EMAIL;

            header('location: login.php');
        } else {
            array_push($errors, "Failed to register user: " . mysqli_error($conn));
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
    <script src="https://kit.fontawesome.com/8cb67ecc37.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="formbox">
            <h1 id="title">Become a member</h1>
            <form method="post" action="register.php">
                <?php include('errors.php'); ?>
                <div class="input-group">
                    <div class="name-container">
                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" placeholder="First name" name="firstname" value="<?php echo htmlspecialchars($FIRSTNAME); ?>">
                        </div>
                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" placeholder="Last name" name="lastname" value="<?php echo htmlspecialchars($LASTNAME); ?>">
                        </div>
                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" placeholder="Username" name="username" value="<?php echo htmlspecialchars($USERNAME); ?>">
                        </div>
                        <div class="input-field">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" placeholder="Full Address" name="address" value="<?php echo htmlspecialchars($CUST_ADDRESS); ?>">
                        </div>
                        <div class="input-field">
                            <i class="fa-regular fa-envelope"></i>
                            <input type="email" placeholder="Email" name="email" value="<?php echo htmlspecialchars($EMAIL); ?>">
                        </div>
                        <div class="input-field">
                            <i class="fa-solid fa-key"></i>
                            <input type="password" placeholder="Password" name="password_1" aria-label="Password">
                        </div>
                        <div class="input-field">
                            <i class="fa-solid fa-key"></i>
                            <input type="password" placeholder="Confirm Password" name="password_2" aria-label="Confirm Password">
                        </div>
                    </div>
                    <p>Already Have an Account? <a href="login.php">Click Here</a></p>
                </div>
                <div class="btn">
                    <button type="submit" name="reg_user">Register</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>