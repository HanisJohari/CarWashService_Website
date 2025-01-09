<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Management</title>
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
    <h2 class="text-center"> Team Management </h2>

    <!-- Add User Form -->
    <div class="mt-4">
        <form action="createTeam.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="TEAM_NAME">Team Name</label>
                    <input type="text" class="form-control" name="TEAM_NAME" id="TEAM_NAME" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="TEAM_STATUS">Team Status</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="TEAM_STATUS" id="statusActive" value="Active" required>
                            <label class="form-check-label" for="statusActive">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="TEAM_STATUS" id="statusInactive" value="Inactive" required>
                            <label class="form-check-label" for="statusInactive">Inactive</label>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Team</button>
        </form>
    </div>

    <!-- User Table -->
    <div class="mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>TEAM_ID</th>
                    <th>TEAM_NAME</th>
                    <th>TEAM_STATUS</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include 'db_connect.php';
                if ($conn) {
                    $sql = "SELECT * FROM team";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['TEAM_ID']}</td>
                                    <td>{$row['TEAM_NAME']}</td>
                                    <td>{$row['TEAM_STATUS']}</td>
                                    <td>
                                        <a href='updateTeam.php?id={$row['TEAM_ID']}' class='btn btn-warning'>Edit</a>
                                        <a href='deleteTeam.php?id={$row['TEAM_ID']}' class='btn btn-danger' onclick='return confirmDelete()'>Delete</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center'>No teams found</td></tr>";
                    }
                    $conn->close();
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Database connection failed.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete?");
}
</script>

</body>
</html>