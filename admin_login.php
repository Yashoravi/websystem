<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "student attendance1";
$conn = new mysqli($host, $user, $password, $db);

if (isset($_POST['login'])) {
    $username = $_POST['admin_user'];
    $password = $_POST['admin_pass'];

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
    } else {
        $error = "Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login - Smart Attendance</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f4f4;
    }

    /* --- Navbar --- */
    .navbar {
        width: 100%;
      display: flex;
      align-items: center;
      background-color: #004d00;
      padding: 10px 20px;
      color: white;
      position: fixed;
     top: 0;
     left:0;
     z-index: 999;
    }
    



    .navbar img {
      height: 40px;
      margin-right: 10px;
    }

    .navbar h1 {
      font-size: 20px;
      margin: 0;
    }

    /* --- Sidebar --- */
   

  

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
 

        body { font-family: Arial; background-color:rgb(240, 143, 143); }
        .login-box {
            width: 400px; margin: 100px auto; padding: 30px;
            background: white; border-radius: 8px; box-shadow: 0 0 10px gray;
        }
        login-box::before {
      content: '';
      position: absolute;
      width: 200%;
      height: 200%;
      top: 100%;
      left: -50%;
      background: rgba(43, 179, 81, 0.2);
      border-radius: 45%;
      animation: wave 10s infinite linear;
      z-index: -1;
    }

    @keyframes wave {
      0% { top: 100%; }
      100% { top: -20%; }
    }
        h2 { text-align: center; color: darkgreen; }
        input[type="text"], input[type="password"] {
            width: 100%; padding: 10px; margin: 10px 0; border: 1px solid gray;
        }
        input[type="submit"] {
            background-color: darkgreen; color: white;
            border: none; padding: 10px; width: 100%;
        }
        .error { color: red; text-align: center; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Admin Login</h2>
        <form method="post">
            <input type="text" name="admin_user" placeholder="Admin Username" required>
            <input type="password" name="admin_pass" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
        </form>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    </div>



  <!-- 🔼 Navbar with Logo and Name -->
  <div class="navbar">
    <img src="dow.jpeg" alt="Logo">
    <h1>SLIATE - Admin Panel</h1>
  </div>

  <!-- 🔽 Footer -->
  <div class="footer">
    &copy; 2025 @SLIATE Smart Attendance System | All Rights Reserved
  </div>

</body>
</html>