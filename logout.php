
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Logout - Smart Attendance System</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f0f0f0;
    }

    /* ✅ Navbar */
    .navbar {
      background-color: #004d00;
      color: white;
      display: flex;
      align-items: center;
      padding: 10px 20px;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 999;
    }

    .navbar img {
      height: 30px;
      margin-right: 10px;
    }

    .navbar h1 {
      font-size: 20px;
      margin: 0;
    }

    /* ✅ Logout Message Container */
    .container {
      margin-top: 100px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: calc(100vh - 160px);
    }

    .logout-box {
      text-align: center;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px gray;
    }

    .logout-box h2 {
      color: #004d00;
      margin-bottom: 20px;
    }

    .logout-box button {
      padding: 10px 20px;
      background-color: #006600;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    .logout-box button:hover {
      background-color: #ff3399;
    }

    /* ✅ Footer */
    .footer {
      background-color: #004d00;
      color: white;
      text-align: center;
      padding: 15px;
      position: fixed;
      bottom: 0;
      width: 100%;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <!-- 🔼 Navbar -->
  <div class="navbar">
    <img src="dow.jpeg" alt="Logo">
    <h1>SLIATE SMART ATTENDANCE SYSTEM</h1>
  </div>

  <!-- 🧾 Logout Message Box -->
  <div class="container">
    <div class="logout-box">
      <h2>You have been logged out.</h2>
      <button onclick="window.location.href='admin_login.php'">Login Again</button>
    </div>
  </div>

  <!-- 🔽 Footer -->
  <div class="footer">
    &copy; 2025 @SLIATE Smart Attendance System | All Rights Reserved
  </div>

</body>
</html>
