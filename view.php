<?php
// DB connection
$conn = new mysqli("localhost", "root", "", "student attendance1");
if ($conn->connect_error) {
    die("DB සම්බන්ධතාවය අසාර්ථකයි: " . $conn->connect_error);
}

// Filters
$dateFilter = $_GET['date'] ?? '';
$stidFilter = $_GET['stid'] ?? '';
$courseFilter = $_GET['course'] ?? '';

// Build query
$sql = "SELECT * FROM attendance1 WHERE 1=1";

if (!empty($dateFilter)) {
    $sql .= " AND Date = '$dateFilter'";
}
if (!empty($stidFilter)) {
    $sql .= " AND StID = '$stidFilter'";
}
if (!empty($courseFilter)) {
    $sql .= " AND Course = '$courseFilter'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Attendance</title>
    <style>
        body { font-family: Arial; margin: 20px; background: #f5f5f5; }
        h2 { color: #006400; }
        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { padding: 10px; border: 1px solid #ccc; }
        th { background: #006400; color: #fff; }
        .filter-form input, .filter-form select { padding: 5px; margin-right: 10px; }
        .export-btn { padding: 6px 12px; background: darkgreen; color: white; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>

<h2>📅 View Attendance Records</h2>

<form method="GET" class="filter-form">
    🔍 Date: <input type="date" name="date" value="<?= $dateFilter ?>">
    🧑‍🎓 StID: <input type="text" name="stid" placeholder="Student ID" value="<?= $stidFilter ?>">
    🎓 Course: <input type="text" name="course" placeholder="Course" value="<?= $courseFilter ?>">
    <input type="submit" value="Filter">
    <a class="export-btn" href="export.php?date=<?= $dateFilter ?>&stid=<?= $stidFilter ?>&course=<?= $courseFilter ?>">📤 Export to Excel</a>
</form>

<table>
    <tr>
        <th>StID</th>
        <th>StName</th>
        <th>Course</th>
        <th>Year</th>
        <th>States</th>
        <th>Date</th>
    </tr>
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['StID'] ?></td>
            <td><?= $row['StName'] ?></td>
            <td><?= $row['Course'] ?? '-' ?></td>
            <td><?= $row['Year'] ?></td>
            <td><?= $row['States'] ?></td>
            <td><?= $row['Date'] ?></td>
        </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="6">No records found.</td></tr>
    <?php endif; ?>
</table>

</body>
</html>