<?php
include('db_connect.php'); // Ensure this file defines the $conn variable

$updateStatus = null;

if (isset($_GET['BOOKING_ID'])) {
    $BOOKING_ID = mysqli_real_escape_string($conn, $_GET['BOOKING_ID']);

    // Fetch current booking details, including customer_id and car details
    $query = "SELECT b.BOOKING_ID, b.BOOKING_DATE, b.TIME_SLOT, b.BOOKING_STATUS,
              u.FIRSTNAME, u.LASTNAME, u.CUST_ADDRESS,
              c.PLATE_NUM, c.TYPE AS CAR_TYPE, c.CAR_COLOR, c.CAR_ID
              FROM booking b
              JOIN user u ON b.USER_ID = u.USER_ID
              LEFT JOIN car c ON c.USER_ID = u.USER_ID
              WHERE b.BOOKING_ID = '$BOOKING_ID'";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error in query execution: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);

    if ($row) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process form submission to update only car details
            $PLATE_NUM = mysqli_real_escape_string($conn, $_POST['plate_num']);
            $CAR_TYPE = mysqli_real_escape_string($conn, $_POST['car_type']);
            $CAR_COLOR = mysqli_real_escape_string($conn, $_POST['car_color']);
    
            // Assuming car_id is the unique identifier for the car that needs to be updated
            $update_car_query = "UPDATE car SET PLATE_NUM = '$PLATE_NUM', TYPE = '$CAR_TYPE', CAR_COLOR = '$CAR_COLOR' WHERE CAR_ID = " . $row['CAR_ID'];
    
            // Execute the update query
            if (mysqli_query($conn, $update_car_query)) {
                $updateStatus = "success";
            } else {
                $updateStatus = "error";
            }
        }
    } else {
        die("Booking ID not found.");
    }
} else {
    die("Booking ID not provided.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Booking Details</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .update-container {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 25px 30px;
            width: 400px;
            max-width: 90%;
        }

        h1 {
            font-size: 2rem;
            color: #cf1f1f;
            text-align: center;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 1.2rem;
            color: #cf1f1f;
            margin-bottom: 20px;
            text-align: center;
        }

        h3 {
            color:  #cf1f1f;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: black;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        button {
            background-color: rgb(196, 25, 25);
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button:hover {
            background-color: rgb(179, 15, 0);
        }

        .back-link {
            display: block;
            margin-top: 15px;
            text-align: center;
            color: #cf1f1f;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color:  #cf1f1f;
        }

        /* Responsive Design */
        @media (max-width: 500px) {
            .update-container {
                padding: 15px;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

<form method="POST" action="update_booking.php?BOOKING_ID=<?php echo $BOOKING_ID; ?>">
    <div class="update-container">
        <h2>Update Car Details</h2>

        <h3>Car Details</h3>

        <label for="plate_num">Car Plate Number:</label>
        <input type="text" id="plate_num" name="plate_num" value="<?php echo htmlspecialchars($row['PLATE_NUM']); ?>" required><br>

        <label for="car_type">Car Type:</label>
        <input type="text" id="car_type" name="car_type" value="<?php echo htmlspecialchars($row['CAR_TYPE']); ?>" required><br>

        <label for="car_color">Car Color:</label>
        <input type="text" id="car_color" name="car_color" value="<?php echo htmlspecialchars($row['CAR_COLOR']); ?>" required><br>

        <div class="button">
            <button type="submit">Update Car</button>
            <a href="inbox2.php" class="back-link">Go Back</a>
        </div>
    </div>
</form>

<?php if ($updateStatus === "success"): ?>
    <script>
        alert("Car details updated successfully.");
        window.location.href = "inbox2.php"; // Redirect to inbox after successful update
    </script>
<?php elseif ($updateStatus === "error"): ?>
    <script>
        alert("Error updating car details.");
    </script>
<?php endif; ?>

</body>
</html>