<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "student attendance1";
$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get total students
$students_result = $conn->query("SELECT COUNT(*) as total FROM student");
if (!$students_result) {
    die("Student query failed: " . $conn->error);
}
$students = $students_result->fetch_assoc()['total'];

// Get total lecturers
$lecturers_result = $conn->query("SELECT COUNT(*) as total FROM lecturer");
if (!$lecturers_result) {
    die("Lecturer query failed: " . $conn->error);
}
$lecturers = $lecturers_result->fetch_assoc()['total'];

// Get today's attendance
$today = date("Y-m-d");
$attendance_result = $conn->query("SELECT COUNT(*) as total FROM attendance1 WHERE Date = '$today'");
if (!$attendance_result) {
    die("Attendance query failed: " . $conn->error);
}
$today_attendance = $attendance_result->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
        }
        .navbar {
            background-color: darkgreen;
            padding: 15px;
            color: white;
        }
        .navbar h2 {
            margin: 0;
            display: inline-block;
        }
        .navbar a {
            float: right;
            color: white;
            background: #ff4d4d;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
        }

         
    



    .navbar img {
      height: 40px;
      margin-right: 10px;
    }

  

    /* --- Sidebar --- */
    .sidebar {
      position: fixed;
      top: 60px;
      left: 0;
      width: 220px;
      height: calc(100% - 100px);
      background-color:rgb(188, 86, 142);
      padding-top: 20px;
      display: flex;
      flex-direction: column;
    }

    .sidebar button {
      padding: 12px;
    
      border: none;
      background: lightgreen;
      color: #000;
      margin: 25px 25px;
      cursor: pointer;
      font-weight: bold;
      border-radius: 8px;
      transition: 0.3s;
    }

    .sidebar button:hover {
      background-color:rgb(255, 123, 189);
      color: white;
    }

    /* --- Main Content --- */
    .main {
      margin-left: 20px;
      padding: 30px;
      margin-top: 40px;
      text-align:center;
    }

    /* --- Footer --- */
    .footer {
      background-color: #004d00;
      color: white;
      text-align: center;
      padding: 15px;
      position: fixed;
      bottom: 0;
      width: 110%;
      font-size: 14px;
    }
        .dashboard {
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            align-items:center;
             margin-left: 300px;
        }
        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            padding: 30px;
            flex: 1;
            min-width: 200px;
            max-width: 25px;
            text-align: center;
            align-items:center;
        }
        .card h3 {
            margin-bottom: 10px;
            color: darkgreen;
        }
        .card p {
            font-size: 24px;
            margin: 0;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <img src="dow.jpeg" alt="Logo">
        <h2>SLIATE Smart Attendance – Admin Dashboard</h2>
        <a href="logout.php">Logout</a>
    </div>

    <!-- 🔼 Navbar with Logo and Name -->
 

  <!-- 📂 Sidebar with Buttons -->
  <div class="sidebar">
    <button onclick="location.href='dashboard.php'">Dashboard</button>
    <button onclick="location.href='manage.php'">Manage Users</button>
    <button onclick="location.href='view.php'">View Attendance</button>
    <button onclick="location.href='notifi.php'">Notifications</button>
    <button onclick="location.href='set.php'">System Settings</button>
    <button onclick="location.href='logout.php'">Logout</button>
  </div>

  

  <!-- 📝 Main Content -->
  <div class="main">
    <h2>Welcome Admin!</h2>
    <h4>This is your login area. Use the sidebar to manage the system.</h4>
  </div>

  <!-- 🔽 Footer -->
  <div class="footer">
    &copy; 2025 @SLIATE Smart Attendance System | All Rights Reserved
  </div>


    <div class="dashboard">
        <div class="card">
            <h3>Total Students</h3>
            <p><?= $students ?></p>
        </div>
        <div class="card">
            <h3>Total Lecturers</h3>
            <p><?= $lecturers ?></p>
        </div>
        <div class="card">
            <h3>Today's Attendance</h3>
            <p><?= $today_attendance ?></p>
        </div>
        <div class="card">
            <h3>Welcome, <?= $_SESSION['admin'] ?></h3>
            <p>You are logged in.</p>
        </div>
    </div>

</body>
</html>