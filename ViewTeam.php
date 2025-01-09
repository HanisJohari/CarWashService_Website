<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Team</title>
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
        
        .btn-primary, .btn-secondary, .btn-warning, .btn-danger {
            background-color: #b6302b;
            border-color: #b6302b;
        }
        .btn-primary:hover, .btn-secondary:hover, .btn-warning:hover, .btn-danger:hover {
            background-color: #8e2320;
            border-color: #8e2320;
        }
        .sidebar a {
            color: #fff;
        }
        .sidebar a:hover {
            background-color: #8e2320;
        }
    </style>
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
        <a href="http://localhost/CarWash/Dashboard.php">
            <i class="fas fa-qrcode"></i>
            <span>Home</span>
        </a>
        <a href="#">
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
        <a href="#" class="if-active">
            <i class="fa-solid fa-chart-lines"></i>
            <span>Sales</span>
        </a>
        <a href="logout.php">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Log Out</span>
        </a>
    </div>
</header>

<div class="container mt-5">
    <h2 class="text-center">Team List</h2>

    <div class="mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>TEAM_ID</th>
                    <th>TEAM_NAME</th>
                    <th>TEAM_STATUS</th>
                </tr>
            </thead>
            <tbody>
            <?php
            include 'db_connect.php';

            $sql = "SELECT * FROM team";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['TEAM_ID'] . "</td>";
                echo "<td>" . $row['TEAM_NAME'] . "</td>";
                echo "<td>" . $row['TEAM_STATUS'] . "</td>";
                echo "</tr>";
            }

            mysqli_close($conn);
            ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>