<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style2.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
     <link rel="stylesheet" href="swiper-bundle.min.css" />

    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="styles1.css">
     
    <!-- Font -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

     <style>
     
         
      .sidebar a:hover{
        
        color: #ffffff;
        background-color: #b93632;
      }
     
    </style>
</head>
<body>
<header class="main-header">
        <input type="checkbox" id="check">
        <label for="check">
          <i class="fa-solid fa-bars" id="btn"></i></i>
          <i class="fas fa-times" id="cancel"></i>
        </label>
        <div class="sidebar">
          <header>Welcome</header>
          <a href="Dashboard.php">
            <i class="fas fa-qrcode"></i>
            <span>Home</span>
          </a>
          <a href="Customer.php">
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
          <a href="Sales.php" class="if-active">
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
        <h2 class="text-center"> Service Management </h2>

        <!-- Add Service Form -->
        <div class="mt-4">
            <form action="createService.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="Service_Name">Service Name</label>
                        <input type="text" class="form-control" name="Service_Name" id="Service_Name" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Service_Price">Service Price</label>
                        <input type="text" class="form-control" name="Service_Price" id="Service_Price" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Service</button>
            </form>
        </div>

        <!-- Service Table -->
        <div class="mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Service_Id</th>
                        <th>Service_Name</th>
                        <th>Service_Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include 'db_connect.php';
                    if ($conn) {
                        $sql = "SELECT * FROM service";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                               echo "<tr>
                                        <td>{$row['SERVICE_ID']}</td>
                                        <td>{$row['SERVICE_NAME']}</td>
                                        <td>{$row['SERVICE_PRICE']}</td>
                                 <td>
                                    <a href='UpdateService.php?id={$row['SERVICE_ID']}' class='btn btn-warning'>Edit</a>
                                    <a href='DeleteService.php?id={$row['SERVICE_ID']}' class='btn btn-danger'>   Delete</a>
                             </td>
                       </tr>";

                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No service found</td></tr>";
                        }
                        $conn->close();
                    } else {
                        echo "<tr><td colspan='3' class='text-center'>Database connection failed.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
</body>
</html>

