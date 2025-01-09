<?php
include 'db_connect.php';

$sql = "SELECT * FROM service";
$result = mysqli_query($conn, $sql);

echo "<h1>Service List</h1>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Service_Name</th><th>Service_Price</th>";

while ($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>" . $row['SERVICE_ID'] . "</td>";
    echo "<td>" . $row['SERVICE_NAME'] . "</td>";
    echo "<td>" . $row['SERVICE_PRICE'] . "</td>";
    echo "<td><a href='deleteService.php?id=" . $row['SERVICE_ID'] . "'>Delete</a></td>";
    echo "</tr>";
}

echo "</table>";
?>
