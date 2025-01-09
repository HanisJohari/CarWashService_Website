<?php
session_start(); // Start the session

// Check if the admin session is active
if (!isset($_SESSION['username'])) {
    header("Location: adminLogin.php"); // Redirect to login page if not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
      .btn-update {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
        font-size: 12px;
        padding: 5px 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      .btn-update:hover {
        background-color: #0056b3;
      }

      .status.confirm {
        color: green;
      }

      .status.pending {
        color: orange;
      }

      .status.cancelled {
        color: red;
      }

      .header-icon {
        display: flex;
        align-items: center;
        padding: 10px;
        position: absolute;
        top: 0;
        right: 0;
      }

      .header-icon .fa-user {
        font-size: 24px;
        margin-right: 8px;
      }

      .header-icon .username {
        font-size: 18px;
      }

      .search-bar {
        width: 100%;
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
      }

      .search-bar input {
        width: 300px;
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }

      .search-bar button {
        padding: 5px 10px;
        border: 1px solid #ccc;
        background-color: #007bff;
        color: white;
        border-radius: 4px;
        margin-left: 5px;
      }

      .search-bar button i {
        margin: 0;
      }

      .container h2 {
        margin-bottom: 20px;
      }

      .sort-bar {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
      }

      .sort-bar button {
        padding: 5px 10px;
        border: 1px solid #ccc;
        background-color: #28a745;
        color: white;
        border-radius: 4px;
        margin-left: 5px;
      }

      .sort-bar button i {
        margin-right: 5px;
      }

      table {
        margin-top: 20px;
      }

      .table th, .table td {
        text-align: center;
        vertical-align: middle;
      }

      .sidebar a:hover {
        color: #ffffff;
        background-color: #b93632;
      }
    </style>
</head>
<body>
<header class="main-header">
    <div class="header-icon">
        <i class="fa-solid fa-user"></i>
        <span class="username"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
    </div>
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

<div class="search-bar">
  <form method="GET" action="Dashboard.php">
    <input type="text" name="search" placeholder="Search by name or booking ID...">
    <button type="submit">
      <i class="fa-solid fa-magnifying-glass"></i>
    </button>
  </form>
</div>

<div class="container mt-5">
    <h2 class="text-center">LATEST TRANSACTION</h2>
    <div class="sort-bar">
      <form method="GET" action="Dashboard.php">
        <button type="submit" name="sort" value="asc">
          <i class="fa-solid fa-sort-amount-up"></i> Sort by Date: Ascending
        </button>
      </form>
    </div>
    <div class="mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>BOOKING_ID</th>
                    <th>USER_ID</th>
                    <th>USER_FIRSTNAME</th>
                    <th>BOOKING_DATE</th>
                    <th>TIME_SLOT</th>
                    <th>PACKAGE_TYPE</th>
                    <th>BOOKING_STATUS</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                include 'db_connect.php';

                // Get search query if it exists
                $searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';
                $sortOrder = isset($_GET['sort']) && $_GET['sort'] == 'asc' ? 'ASC' : 'DESC'; // Default to DESC

                if ($conn) {
                    // SQL query with search and sort
                    $sql = "SELECT booking.BOOKING_ID, booking.USER_ID, user.FIRSTNAME, booking.BOOKING_DATE, booking.TIME_SLOT, package.PACKAGE_TYPE, booking.BOOKING_STATUS
                            FROM booking 
                            JOIN user ON booking.USER_ID = user.USER_ID
                            JOIN package ON booking.PACKAGE_ID = package.PACKAGE_ID";
                    
                    if (!empty($searchQuery)) {
                        if (is_numeric($searchQuery)) {
                            // If the search query is numeric, search by exact BOOKING_ID
                            $sql .= " WHERE booking.BOOKING_ID = ?";
                        } else {
                            // Otherwise, perform a partial match on USER_FIRSTNAME
                            $sql .= " WHERE user.FIRSTNAME LIKE ?";
                        }
                    }

                    $sql .= " ORDER BY booking.BOOKING_DATE $sortOrder";

                    $stmt = $conn->prepare($sql);
                    if (!empty($searchQuery)) {
                        if (is_numeric($searchQuery)) {
                            $stmt->bind_param("i", $searchQuery);
                        } else {
                            $searchTerm = "%$searchQuery%";
                            $stmt->bind_param("s", $searchTerm);
                        }
                    }
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['BOOKING_ID']}</td>
                                    <td>{$row['USER_ID']}</td>
                                    <td>{$row['FIRSTNAME']}</td>
                                    <td>{$row['BOOKING_DATE']}</td>
                                    <td>{$row['TIME_SLOT']}</td>
                                    <td>{$row['PACKAGE_TYPE']}</td>
                                    <td><span class='status " . strtolower($row['BOOKING_STATUS']) . "'>● {$row['BOOKING_STATUS']}</span></td>
                                    <td><button class='btn btn-update' onclick='updateStatus(this)'>Update</button></td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>No bookings found</td></tr>";
                    }
                    $stmt->close();
                    $conn->close();
                } else {
                    echo "<tr><td colspan='8' class='text-center'>Database connection failed.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function updateStatus(button) {
    const row = button.closest('tr');
    const statusCell = row.querySelector('.status');
    const currentStatus = statusCell.innerText.trim().toLowerCase();

    if (currentStatus === '● pending') {
        const bookingId = row.querySelector('td').innerText;

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'updateStatus.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
            console.log('Response from server:', xhr.responseText);
            if (xhr.status === 200 && xhr.responseText.includes('Status updated successfully')) {
                statusCell.innerHTML = '● Confirm';
                statusCell.classList.remove('pending');
                statusCell.classList.add('confirm');
                alert('Payment confirmed!');
            } else {
                alert('Failed to update status: ' + xhr.responseText);
            }
        };

        xhr.send('BOOKING_ID=' + bookingId);
    } else {
        alert('Status already confirmed or cancelled!');
    }
}
</script>

</body>
</html>