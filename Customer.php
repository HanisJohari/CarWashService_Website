<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="swiper-bundle.min.css" />
    <link rel="stylesheet" href="styles1.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
     
         
      .sidebar a:hover{
        
        color: #ffffff;
        background-color: #b93632;
      }
     
    </style>
    
}
</head>
<body>
<header class="main-header">
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fa-solid fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
        <header>Welcome</header>
        <a href="Dashboard.php">
            <i class="fas fa-qrcode"></i>
            <span>Home</span>
        </a>
        <a href="Customer.php" class="if-active">
            <i class="fa-solid fa-users"></i>
            <span>Customer</span>
        </a>
        <a href="Staff.php">
            <i class="fa-solid fa-people-arrows"></i>
            <span>Staff</span>
        </a>
        <a href="Team.php">
            <i class="fas fa-users"></i>
            <span>Team</span>
        </a>
        <a href="ServiceCar.php">
            <i class="far fa-tools"></i>
            <span>Service</span>
        </a>
        <a href="Sales.php" >
            <i class="fa-solid fa-chart-line"></i>
            <span>Sales</span>
        </a>
        <a href="logout.php">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Log Out</span>
        </a>
    </div>
</header>

<div class="container mt-5">
    <h2 class="text-center">Customer List</h2>

    <!-- User Table -->
    <div class="mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>USER_ID</th>
                    <th>TEAM_NAME</th>
                    <th>FIRSTNAME</th>
                    <th>LASTNAME</th>
                    <th>EMAIL</th>
                    <th>ADDRESS</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include 'db_connect.php';
                if ($conn) {
                    // Modified SQL query to join 'users' and 'team' tables
                    $sql = "SELECT user.USER_ID, team.TEAM_NAME, user.FIRSTNAME, user.LASTNAME, user.EMAIL, user.CUST_ADDRESS
                            FROM user
                            LEFT JOIN team ON user.TEAM_ID = team.TEAM_ID";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['USER_ID']}</td>
                                    <td>{$row['TEAM_NAME']}</td>
                                    <td>{$row['FIRSTNAME']}</td>
                                    <td>{$row['LASTNAME']}</td>
                                    <td>{$row['EMAIL']}</td>
                                    <td>{$row['CUST_ADDRESS']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center'>No customers found</td></tr>";
                    }
                    $conn->close();
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Database connection failed.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>