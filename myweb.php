<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_SESSION['registered_user']) &&
        $_POST['username'] === $_SESSION['registered_user'] &&
        $_POST['password'] === $_SESSION['registered_pass']
    ) {
        echo "<script>
            alert('Your login successfully!');
            window.location.href='home.php';
        </script>";
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}
$host = "localhost";
$user = "root";
$password = "";
$db = "student attendance1";
$conn = new mysqli($host, $user, $password, $db);

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $stid = $_POST['stid'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $location = $_POST['location'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    $conn->query("INSERT INTO users1 (name,stid,age	,gender,location,course,year,username,password
	) VALUES ('$name','$stid','$age','$gender'','$location','$course','$year','$username','$password'	)");
    $success = "📣 Message sent successfully!";
}

?>




<!DOCTYPE html>
<html>
<head>
    <title>SLIATE Login</title>
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            background: url('ss.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }
        .navbar {
            font-size: 22px;
            background-color: darkgreen;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
        }
        .navbar .left {
            display: flex;
            align-items: center;
        }
        .navbar img {
            height: 50px;
            margin-right: 10px;
        }
        .search-bar input {
            padding: 6px;
            margin-right: 5px;
        }
        .container {
            display: flex;
            padding: 50px;
            
        }
        .left-box {
            width: 80%;
            padding: 20px;
        }
        .left-box h1 {
            font-size: 36px;
        }
        .right-box {
            width: 30%;
            background: rgba(0,0,0,0.8);
            padding: 50px;
            border-radius: 10px;
        }
        .right-box h2 {
            background: orange;
            padding: 10px;
            color: black;
            text-align: center;
            border-radius: 5px;
        }
        .right-box form {
            margin-top: 10px;
        }
        .right-box input[type="text"],
        .right-box input[type="password"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: none;
        }
        .right-box input[type="submit"] {
            width: 30%;
            padding: 10px;
             margin: 20px 85px;
            background: orange;
            border: none;
            color: black;
            font-weight: bold;
        }
        .register-link {
            margin-top: 15px;
            text-align: center;
        }
        .register-link a {
            color: orange;
            text-decoration: none;
        }
        .black-box {
            font-size: 15px;
            background: darkred;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        .black-box img {
            height: 70px;
            margin-right: 10px;
        }
        .footer {
            background: darkgreen;
            color: white;
            text-align: center;
            padding: 10px;
        }
        .social-icons i {
            margin: 0 10px;
            font-size: 50px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="left">
            <img src="dow.jpeg" alt="Logo">
            <strong>SLIATE</strong>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Type to Search">
            <button>Search</button>
        </div>
    </div>

    <!-- Main Section -->
    <div class="container">
        <div class="left-box">
            <h1>Hello Guys ! Welcome our Smart Student Attendance System</h1>
            <p>This is a smart student attendance system <br>
                developed for SLIATE institutions.<br>
                 It allows secure and efficient attendance using QR codes . </p>
                 <h3>Register first to use the system.</h3>
        </div>
        <div class="right-box">
            <h2>Login Here</h2>
            <form method="POST" action="">
                <input type="text" name="username" placeholder="Enter username Here" required>
                <input type="password" name="password" placeholder="Enter Password Here" required>
                <input type="submit" name="login" value="Login">
            </form>
            <div class="register-link">
                Don’t have an account? <a href="regi.php">Sign up</a> here
            </div>
        </div>
    </div>

    <!-- Black Box Bottom Info -->
    <div class="black-box">
        <div>
            <img src="dow.jpeg" alt="Logo">
            <p><strong>SLIATE Smart Attendance</strong></p>
        </div>
        <div>
            <p><i class="fab fa-facebook"></i> Facebook:   SLIATEofficial</p>
            <p><i class="fas fa-envelope"></i> Email:   info@sliate.lk</p>
            <p><i class="fas fa-map-marker-alt"></i> Location:   Colombo, Sri Lanka</p>
            <p><i class="fas fa-phone"></i> Contact:   +94 11 2345678</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        © SLIATE Smart Attendance System
    </div>

</body>
</html>