<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Management</title>
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
    <h2 class="text-center">Staff Management</h2>

    <!-- Add User Form -->
    <div class="mt-4">
        <form action="create.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="STAFF_FNAME">First Name</label>
                    <input type="text" class="form-control" name="STAFF_FNAME" id="STAFF_FNAME" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="STAFF_LNAME">Last Name</label>
                    <input type="text" class="form-control" name="STAFF_LNAME" id="STAFF_LNAME" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="STAFF_GENDER">Gender</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="STAFF_GENDER" id="genderMale" value="Male" required>
                            <label class="form-check-label" for="genderMale">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="STAFF_GENDER" id="genderFemale" value="Female" required>
                            <label class="form-check-label" for="genderFemale">Female</label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="STAFF_CONTACT">Contact</label>
                    <input type="text" class="form-control" name="STAFF_CONTACT" id="STAFF_CONTACT" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="TEAM_ID">Team</label>
                    <select class="form-control" name="TEAM_ID" id="TEAM_ID" required>
                        <option value="">Select Team</option>
                        <?php 
                        // Fetch the available teams from the database
                        include 'db_connect.php';
                        if ($conn) {
                            $sql = "SELECT TEAM_ID, TEAM_NAME FROM team"; // Assuming you have a 'teams' table
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='{$row['TEAM_ID']}'>{$row['TEAM_NAME']}</option>";
                                }
                            } else {
                                echo "<option value=''>No teams available</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add Staff</button>
        </form>
    </div>

    <!-- Search Form -->
    <div class="mt-4">
        <form action="" method="GET" class="form-inline">
            <div class="form-group mr-2">
                <input type="text" class="form-control" name="search" placeholder="Search by Team Name" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="Dashboard.php" class="btn btn-secondary ml-2">Clear</a>
        </form>
    </div>

    <!-- User Table -->
    <div class="mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STAFF_ID</th>
                    <th>TEAM_NAME</th>
                    <th>STAFF_FNAME</th>
                    <th>STAFF_LNAME</th>
                    <th>STAFF_GENDER</th>
                    <th>STAFF_CONTACT</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            include 'db_connect.php';
            if ($conn) {
                $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
                $sql = "SELECT staff.STAFF_ID, staff.STAFF_FNAME, staff.STAFF_LNAME, staff.STAFF_GENDER, staff.STAFF_CONTACT, team.TEAM_NAME 
                        FROM staff
                        LEFT JOIN team ON staff.TEAM_ID = team.TEAM_ID";

                if (!empty($search)) {
                    $sql .= " WHERE staff.STAFF_FNAME LIKE '%$search%' 
                              OR staff.STAFF_LNAME LIKE '%$search%' 
                              OR staff.STAFF_CONTACT LIKE '%$search%' 
                              OR team.TEAM_NAME LIKE '%$search%'";
                }

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['STAFF_ID']}</td>
                                <td>{$row['TEAM_NAME']}</td> 
                                <td>{$row['STAFF_FNAME']}</td>
                                <td>{$row['STAFF_LNAME']}</td>
                                <td>{$row['STAFF_GENDER']}</td>
                                <td>{$row['STAFF_CONTACT']}</td>
                                <td>
                                    <a href='UpdateStaff.php?id={$row['STAFF_ID']}' class='btn btn-warning'>Edit</a>
                                    <a href='DeleteStaff.php?STAFF_ID={$row['STAFF_ID']}' class='btn btn-danger' onclick='return confirmDelete()'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No staff found</td></tr>";
                }
                $conn->close();
            } else {
                echo "<tr><td colspan='7' class='text-center'>Database connection failed.</td></tr>";
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