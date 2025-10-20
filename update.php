<!DOCTYPE html>
<html>
<head>
    <title>SLIATE SMART ATTENDANCE SYSTEM - Update Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: url('j.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .navbar {
            display: flex;
            align-items: center;
            background-color: #004d00;
            padding: 10px 20px;
        }

        .navbar img {
            height: 50px;
            margin-right: 15px;
        }

        .navbar-title {
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
            font-size: 24px;
            color: white;
            flex-grow: 1;
        }

        .navbar a {
            margin-left: 10px;
            padding: 5px 8px;
            text-decoration: none;
            background-color: #90ee90;
            color: black;
            font-size: 10px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .navbar a.active, .navbar a:hover {
            background-color: pink;
            color: black;
        }

        h2 {
            text-align: center;
            color: white;
            margin-top: 20px;
        }

        .container {
            display: flex;
            justify-content: space-around;
            margin:80px auto;
            max-width:1200px;
        }

        .form-box {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 12px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius:10px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #90ee90;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #6fcf6f;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
 
    <img src="dow.jpeg" alt="Logo" class="logo">
    <div class="navbar-title">SLIATE </div>
    <a href="home.php" class="active">HOME</a>
    <a href="log.php">LOGIN</a>
    <a href="percent.php">SCANNER</a>
    <a href="s.php">PERCENTAGE</a>
    <a href="update.php">UPDATE</a>
</div>

<h2>Update Details</h2>

<div class="container">
    <!-- Add Student Form -->
    <div class="form-box">
        <h3>Add Students</h3>
        <form method="POST" action="">
            <input type="text" name="STName" placeholder="Name" required>
            <input type="text" name="StID" placeholder="Student ID" required>
            <select name="gender" required>
                <option value="">--Gender--</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <input type="text" name="address" placeholder="Address" required>
            <button type="submit" name="update">Update</button>
        </form>
    </div>

    <!-- Remove Student Form -->
    <div class="form-box">
        <h3>Remove Students</h3>
        <form method="POST" action="">
            <input type="text" name="remove_StID" placeholder="Student ID" required>
            <button type="submit" name="remove">Remove</button>
        </form>
    </div>
</div>

<?php
// DB connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student attendance1"; // Replace with your DB name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add student
if (isset($_POST['update'])) {
    $STName = $_POST['STName'];
    $StID = $_POST['StID'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $sql = "INSERT INTO student (STName,StID , gender, address) 
            VALUES ('$STName', '$StID', '$gender', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Student added successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Remove student
if (isset($_POST['remove'])) {
    $remove_ID = $_POST['remove_StID'];

    $sql = "DELETE FROM student WHERE StID = '$remove_ID'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Student removed successfully');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>

</body>
</html>


