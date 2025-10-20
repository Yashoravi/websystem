<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>System Settings - Admin Panel</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f4f4;
    }

    /* 🟢 Navbar */
    .navbar {
      display: flex;
      align-items: center;
      background-color: #004d00;
      padding: 10px 20px;
      color: white;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
    }

    .navbar img {
      height: 40px;
      margin-right: 10px;
    }

    .navbar h1 {
      font-size: 20px;
      margin: 0;
    }

    /* 🟢 Sidebar */
    .sidebar {
      position: fixed;
      top: 60px;
      left: 0;
      width: 220px;
      height: calc(100% - 100px);
      background-color: #006600;
      padding-top: 20px;
      display: flex;
      flex-direction: column;
    }

    .sidebar button {
      padding: 12px;
      border: none;
      background: lightgreen;
      color: #000;
      margin: 5px 15px;
      cursor: pointer;
      font-weight: bold;
      border-radius: 8px;
      transition: 0.3s;
    }

    .sidebar button:hover {
      background-color: #ff66b2;
      color: white;
    }

    /* 🟢 Main Content */
    .main {
      margin-left: 240px;
      margin-top: 80px;
      padding: 30px;
    }

    .main h2 {
      color: #004d00;
    }

    form {
      background: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 0 10px #ccc;
      max-width: 600px;
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }

    input, select, textarea {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #aaa;
      border-radius: 6px;
    }

    button[type="submit"] {
      margin-top: 20px;
      background-color: #004d00;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    button[type="submit"]:hover {
      background-color: #ff3399;
    }

    /* 🟢 Footer */
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

  <!-- 🔝 Navbar -->
  <div class="navbar">
    <img src="dow.jpeg" alt="Logo">
    <h1>SLIATE SMART ATTENDANCE SYSTEM - Admin Panel</h1>
  </div>

  <!-- 📂 Sidebar -->
  <div class="sidebar">
    <button onclick="location.href='dashboard.php'">Dashboard</button>
    <button onclick="location.href='manage.php'">Manage Users</button>
    <button onclick="location.href='view.php'">View Attendance</button>
    <button onclick="location.href='notifi.php'">Notifications</button>
    <button onclick="location.href='set.php'">System Settings</button>
    <button onclick="location.href='logout.php'">Logout</button>
  </div>

  <!-- ⚙️ System Settings Content -->
  <div class="main">
    <h2>System Settings</h2>
    <form action="save_settings.php" method="POST">
      <label for="system_name">System Name</label>
      <input type="text" id="system_name" name="system_name" value="SLIATE SMART ATTENDANCE SYSTEM" required>

      <label for="theme">Theme Color</label>
      <select id="theme" name="theme">
        <option value="green">Dark Green</option>
        <option value="blue">Blue</option>
        <option value="black">Black</option>
        <option value="custom">Custom</option>
      </select>

      <label for="scan_mode">QR Scan Mode</label>
      <select id="scan_mode" name="scan_mode">
        <option value="auto">Auto Submit</option>
        <option value="manual">Manual Submit</option>
      </select>

      <label for="contact_email">Admin Contact Email</label>
      <input type="email" id="contact_email" name="contact_email" value="admin@sliate.lk" required>

      <label for="support_note">Support Message</label>
      <textarea id="support_note" name="support_note" rows="4">If you face any issues, contact admin@sliate.lk</textarea>

      <button type="submit">Save Settings</button>
    </form>
  </div>

  <!-- 🔻 Footer -->
  <div class="footer">
    &copy; 2025 @SLIATE Smart Attendance System | All Rights Reserved
  </div>

</body>
</html>
