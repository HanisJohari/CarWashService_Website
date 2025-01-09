

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Staff</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background: url('images/background.png') no-repeat center center fixed;
            background-size: cover;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-container label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        .form-container input, .form-container select, .form-container button {
            width: 90%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container button {
            margin-top: 20px;
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: darkred;
        }

    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add New Staff</h1>
        <!-- <form method="POST" action="new.php?ref=brigade.php"> -->
        <form method="POST" action="ViewStaff.php?">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" placeholder="Enter first name" required>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" placeholder="Enter last name" required>

            <label for="gender">Gender:</label>
            <input type="text" name="gender" id="gender" placeholder="Enter gender" required>

            <label for="contact">Contact:</label>
            <input type="text" name="contact" id="contact" placeholder="Enter contact number" required>

            <!-- <label for="image">Image URL:</label>
            <input type="text" name="image" id="image" placeholder="Enter image URL" required> -->

            <button type="submit">Save</button>
        </form>

    </div>


</body>
</html>
   