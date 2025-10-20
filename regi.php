<?php
var_dump($_POST);
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['registered_user'] = $_POST['username'];
    $_SESSION['registered_pass'] = $_POST['password'];
    echo "<script>
        alert('Welcome to the SLIATE Smart Attendance System 👋');
        window.location.href = 'myweb.php';
    </script>";
}



// Connect to database
$conn = new mysqli("localhost", "root", "", "student attendance1");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $stid = $_POST['stid'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $location = $_POST['location'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // encrypt password

    // Insert into database
    $sql = "INSERT INTO user1 (name, stid, age, gender, location, course, year, username, password)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssissssss", $name, $stid, $age, $gender, $location, $course, $year, $username, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful'); window.location='log.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body {
            background-image: url('v.jpg');
            background-size: cover;
            font-family: Arial;
            color: white;
        }
        .register-box {
            width: 400px;
            margin: 100px auto;
            background: rgba(0,0,0,0.8);
            padding: 30px;
            border-radius: 10px;
        }

        .footer {
            background: darkgreen;
            color: white;
            text-align: center;
            padding: 10px;
        }

        input {
            width: 100%; padding: 10px; margin: 10px 0;
        }
        button {
            padding: 10px 20px; background: orange; border: none; width: 100%;
        }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>Register</h2>
        <form method="POST">
            <input name="name" placeholder="Name" required>
            <input name="stid" placeholder="StID No" required>
            <input name="age" placeholder="Age" required>
            <input name="gender" placeholder="Gender" required>
            <input name="location" placeholder="Location" required>
            <input name="course" placeholder="Course" required>
            <input name="year" placeholder="Year" required>
            <input name="username" placeholder="Username" required>
            <input name="password" type="password" placeholder="Password" required>
            <input name="repassword" type="password" placeholder="Re-enter Password" required>
            <button type="submit">Sign In</button>
        </form>
    </div>

     <div class="footer">
        © SLIATE Smart Attendance System
    </div>
</body>
</html>