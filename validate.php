<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $pw = $_POST['password'];

        $host = "localhost";
        $db_user = "root";
        $db_password = "";
        $dbname = "carwash";
        $port = 3307;

        // Establishing the connection
        $link = new mysqli($host, $db_user, $db_password, $dbname, $port);

        if ($link->connect_error) {
            die("Connection Failed: " . $link->connect_error);
        }

        echo "Database connected successfully.<br>";
        echo "Input Username: $username<br>";
        echo "Input Password: $pw<br>";

        // Query to check login credentials
        $query = "SELECT * FROM admin WHERE LOWER(ADMIN_USERNAME) = LOWER(?)";
        $stmt = $link->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            echo "User found in database.<br>";
            $row = $result->fetch_assoc();
            if ($pw === $row['ADMIN_PASSWORD']) {
                // Successful login
                $_SESSION['username'] = $username;
                header("Location: Dashboard.php");
                exit;
            }
            
            } 
            
            else {
                echo "<script>alert('Invalid password.');</script>";
            }
        } 
        
        else {
            echo "<script>alert('Invalid username.');</script>";
        }

        $stmt->close();
        $link->close();
    } 
    // else {
    //     echo "<script>alert('Please fill in both username and password fields.');</script>";
    // }

?>
