<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="swiper-bundle.min.css" />
    <link rel="stylesheet" href="styles1.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .sidebar a:hover {
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
    <h2 class="text-center">Sales Management for Year 2024</h2>

    <!-- Sales Data Table -->
    <div class="mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SALES_ID</th>
                    <th>TOTAL_SALES</th>
                    <th>SALES_DATE</th>
                    <th>SALE_MONTH</th>
                    <th>MONTHLY_TOTAL_SALES(RM)</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include 'db_connect.php';
                $salesData = [];
                $monthlyTotals = [];
                if ($conn) {
                    $sql = "SELECT 
                                s.SALES_ID, 
                                p.PAYMENT_TOTAL_PRICE AS TOTAL_SALES, 
                                s.SALES_DATE,
                                DATE_FORMAT(s.SALES_DATE, '%M') AS SALE_MONTH,
                                SUM(p.PAYMENT_TOTAL_PRICE) OVER (PARTITION BY DATE_FORMAT(s.SALES_DATE, '%Y-%m')) AS MONTHLY_TOTAL_SALES
                            FROM sale s
                            JOIN payment p ON s.SALES_ID = p.SALES_ID
                            WHERE YEAR(s.SALES_DATE) = 2024
                              AND EXISTS (
                                  SELECT 1
                                  FROM booking b
                                  WHERE b.BOOKING_ID = p.BOOKING_ID
                                    AND b.BOOKING_STATUS = 'Confirm'
                              )
                            ORDER BY DATE_FORMAT(s.SALES_DATE, '%m')";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $salesData[] = $row;
                            // Aggregate monthly totals
                            $month = $row['SALE_MONTH'];
                            if (!isset($monthlyTotals[$month])) {
                                $monthlyTotals[$month] = 0;
                            }
                            $monthlyTotals[$month] += $row['TOTAL_SALES'];
                        }

                        $prevMonth = '';
                        foreach ($salesData as $index => $row) {
                            $month = $row['SALE_MONTH'];
                            echo "<tr>
                                    <td>{$row['SALES_ID']}</td>
                                    <td>{$row['TOTAL_SALES']}</td>
                                    <td>{$row['SALES_DATE']}</td>";

                            if ($prevMonth != $month) {
                                $rowspan = count(array_filter($salesData, function($data) use ($month) {
                                    return $data['SALE_MONTH'] == $month;
                                }));
                                echo "<td rowspan='{$rowspan}'>{$month}</td>
                                      <td rowspan='{$rowspan}'>{$monthlyTotals[$month]}</td>";
                                $prevMonth = $month;
                            }

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>No sale record found</td></tr>";
                    }
                    $conn->close();
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Database connection failed.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Sales Data Chart -->
    <div class="mt-5">
        <canvas id="salesChart" width="500" height="200"></canvas>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const salesData = <?php echo json_encode($salesData); ?>;
        const labels = [...new Set(salesData.map(data => data.SALE_MONTH))];
        const data = labels.map(label => salesData.filter(sale => sale.SALE_MONTH === label).reduce((sum, sale) => sum + parseFloat(sale.TOTAL_SALES), 0));

        const colors = [
            'rgba(255, 99, 132, 0.2)', // January
            'rgba(54, 162, 235, 0.2)', // February
            'rgba(75, 192, 192, 0.2)', // March
            'rgba(153, 102, 255, 0.2)', // April
            'rgba(255, 159, 64, 0.2)', // May
            'rgba(255, 206, 86, 0.2)', // June
            'rgba(105, 105, 105, 0.2)', // July
            'rgba(123, 104, 238, 0.2)', // August
            'rgba(255, 127, 80, 0.2)', // September
            'rgba(60, 179, 113, 0.2)', // October
            'rgba(30, 144, 255, 0.2)', // November
            'rgba(220, 20, 60, 0.2)', // December
        ];

        const borderColors = [
            'rgba(255, 99, 132, 1)', // January
            'rgba(54, 162, 235, 1)', // February
            'rgba(75, 192, 192, 1)', // March
            'rgba(153, 102, 255, 1)', // April
            'rgba(255, 159, 64, 1)', // May
            'rgba(255, 206, 86, 1)', // June
            'rgba(105, 105, 105, 1)', // July
            'rgba(123, 104, 238, 1)', // August
            'rgba(255, 127, 80, 1)', // September
            'rgba(60, 179, 113, 1)', // October
            'rgba(30, 144, 255, 1)', // November
            'rgba(220, 20, 60, 1)', // December
        ];

        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Monthly Total Sales',
                    data: data,
                    backgroundColor: colors.slice(0, labels.length),
                    borderColor: borderColors.slice(0, labels.length),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
</body>
</html>