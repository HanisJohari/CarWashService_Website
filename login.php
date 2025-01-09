<?php
session_start(); // Start the session at the beginning

$errors = array(); 
include('db_connect.php'); // Your existing db_connect.php include

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $query = "SELECT * FROM USER WHERE USERNAME='$username' AND PASSWORD='$password'";
        $results = mysqli_query($conn, $query);

        if (!$results) {
            die('Query failed: ' . mysqli_error($conn));
        }

        if (mysqli_num_rows($results) == 1) {
            $user = mysqli_fetch_assoc($results);
            $_SESSION['user_id'] = $user['USER_ID'];
            $_SESSION['username'] = $user['USERNAME'];
            $_SESSION['firstname'] = $user['FIRSTNAME'];
            $_SESSION['lastname'] = $user['LASTNAME'];
            $_SESSION['email'] = $user['EMAIL'];
            $_SESSION['address'] = $user['CUST_ADDRESS'];

            // Debugging: Print session variables
            error_log("Logged in as: " . $_SESSION['username']);
            
            header('Location: user.php');
            exit();
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <script src="https://kit.fontawesome.com/8cb67ecc37.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
       <div class="formbox">
        <h1 id="title">Login</h1>
        <form action="login.php" method="post">
            <?php include('errors.php'); ?>
            <div class="input-group">
                <div class="input-field">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="input-field">
                    <i class="fa-solid fa-key"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div>
                    <p>Not Yet A Member? <a href="register.php">Register</a></p>
                    <p>Log in As Admin? <a href="adminLogin.php">Click Here</a></p>
                </div>
                <div class="btn">
                    <button type="submit" name="login_user">Login</button>
                </div>
            </div>
        </form>
       </div>
    </div>
</body>
</html>