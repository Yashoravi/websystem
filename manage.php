<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Database Connection
$host = "localhost";
$user = "root";
$password = "";
$db = "student attendance1";
$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle student deletion
if (isset($_GET['delete_student'])) {
    $id = intval($_GET['delete_student']);
    $conn->query("DELETE FROM student WHERE id = $id");
    header("Location: manage.php");
    exit();
}

// Handle lecturer deletion
if (isset($_GET['delete_lecturer'])) {
    $id = intval($_GET['delete_lecturer']);
    $conn->query("DELETE FROM lecturer WHERE id = $id");
    header("Location: manage.php");
    exit();
}

// Fetch student and lecturer data
$students = $conn->query("SELECT * FROM student ORDER BY StID DESC");
$lecturers = $conn->query("SELECT * FROM lecturer ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 20px;
        }
        .navbar {
            background: darkgreen;
            padding: 15px;
            color: white;
            margin-bottom: 20px;
        }
        h2 {
            margin: 0;
        }
        .table-section {
            margin-bottom: 40px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px #ccc;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: lightgreen;
        }
        .delete-btn {
            background: red;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
        }
        .add-btn {
            margin-bottom: 10px;
            display: inline-block;
            padding: 10px 15px;
            background: darkgreen;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <h2>Manage Users</h2>
</div>

<div class="table-section">
    <h3>📚 Students</h3>
    <a class="add-btn" href="update.php">+ Add Student</a>
    <table>
        <tr>
            <th>StID</th>
            <th>StName</th>
            <th>Gender</th>
            <th>Address</th>
            
            
        </tr>
        <?php while($row = $students->fetch_assoc()): ?>
        <tr>
            <td><?= $row['StID'] ?></td>
            <td><?= $row['StName'] ?></td>
            <td><?= $row['Gender'] ?></td>
            <td><?= $row['Address'] ?></td>
           
            <td>
                <a href="update.php?StID=<?= $row['StID'] ?>">Edit</a> |
                <a class="delete-btn" href="?delete_student=<?= $row['id'] ?>" onclick="return confirm('Delete student?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

<div class="table-section">
    <h3>🎓 Lecturers</h3>
    <a class="add-btn" href="add_lecturer.php">+ Add Lecturer</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Action</th>
        </tr>
        <?php while($row = $lecturers->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['department'] ?></td>
            <td>
                <a href="edit_lecturer.php?id=<?= $row['id'] ?>">Edit</a> |
                <a class="delete-btn" href="?delete_lecturer=<?= $row['id'] ?>" onclick="return confirm('Delete lecturer?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>