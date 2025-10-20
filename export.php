<?php
$conn = new mysqli("localhost", "root", "", "student attendance1");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$date = $_GET['date'] ?? '';
$stid = $_GET['stid'] ?? '';
$course = $_GET['course'] ?? '';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=attendance_export.xls");

echo "<table border='1'>
<tr>
    <th>StID</th>
    <th>StName</th>
    <th>Course</th>
    <th>Year</th>
    <th>States</th>
    <th>Date</th>
</tr>";

$sql = "SELECT * FROM attendance1 WHERE 1=1";
if (!empty($date)) $sql .= " AND Date = '$date'";
if (!empty($stid)) $sql .= " AND StID = '$stid'";
if (!empty($course)) $sql .= " AND Course = '$course'";

$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['StID']}</td>
        <td>{$row['StName']}</td>
        <td>{$row['Course']}</td>
        <td>{$row['Year']}</td>
        <td>{$row['States']}</td>
        <td>{$row['Date']}</td>
    </tr>";
}
echo "</table>";