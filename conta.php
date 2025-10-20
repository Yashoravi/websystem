<?php
$conn = new mysqli("localhost", "root", "", "student attendance1");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success = "";
if (isset($_POST['submit'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    $conn->query("INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')");
    $success = "📩 Message sent successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact / Support - SLIATE Smart Attendance</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
        background: url('u.jpg');
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
     
    }

    /* Navbar */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: darkgreen;
      color: white;
      padding: 10px 30px;
    }

    .navbar-logo {
      display: flex;
      align-items: center;
    }

    .navbar-logo img {
      height: 40px;
      margin-right: 10px;
    }

    .navbar-buttons a {
      color: lightgreen;
      text-decoration: none;
      margin: 0 5px;
      font-weight: bold;
      transition: color 0.3s;
    }

    .navbar-buttons a:hover {
      color: pink;
    }

    /* Contact Form 
    .contact-container {
      max-width: 600px;
      margin: 60px auto 20px auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .contact-container h2 {
      display: flex;
      align-items: center;
      font-size: 22px;
    }

    .contact-container h2 i {
      margin-right: 10px;
      color: red;
    }

    .contact-container input,
    .contact-container textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .contact-container button {
      background: darkgreen;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }

    .contact-container button:hover {
      background: green;
    }*/

    /* Contact Info Section */
    .social-contact {
      max-width: 600px;
      margin: 20px auto;
      background: #000;
      color: white;
      padding: 20px;
      border-radius: 8px;
      font-size: 16px;
    }
    .navbar a {
      margin-left: 20px;
      margin-right: 10px;
      padding: 5px 5px;
      text-decoration: none;
      background-color: #90ee90;
      color: black;
      gap:12px;
      font-size: 10px;
      border-radius: 5px;
      transition: background-color 0.3s ease;
      font-weight: bold;
    }

    .navbar a.active {
      background-color: pink !important;
    }

    .navbar a:hover {
      background-color: #006600;
      color: white;
    }

    .social-contact i {
      margin-right: 10px;
      color: lightgreen;
    }

    .social-contact p {
      margin: 10px 0;
    }

    /* Footer */
    footer {
      background-color: darkgreen;
      color: white;
      text-align: center;
      padding: 15px 0;
      font-size: 14px;
      margin-top: 20px;
    }

    <title>Contact Us</title>
    
        body { font-family: Arial;  padding: 20px; }
        .box { background: rgba(255, 255, 255, 0.2) ; padding: 20px; width: 500px; margin: auto; border-radius: 10px; }
        input, textarea { width: 100%; padding: 10px; margin-top: 10px; border-radius: 5px; border: 1px solid #ccc; }
        button { padding: 10px 20px; background: darkgreen; color: white; border: none; margin-top: 10px; border-radius: 5px; }
        .success { color: green; }
    
  </style>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <div class="navbar-logo">
      <img src="dow.jpeg" alt="Logo"> <!-- Replace with your actual logo path -->
      <span><strong>SLIATE </strong></span>
    </div>
    <div class="navbar-buttons">
      <!--<a href="index.html">Home</a>
      <a href="attendance.html">Attendance</a>
      <a href="students.html">Students</a>
      <a href="qrcode.html">QR Codes</a>
      <a href="reports.html">Reports</a>
      <a href="contact.html">Contact</a>-->
      <a href="home.php" onclick="setActive(this)">HOME</a>

    <button><a href="log.php" onclick="setActive(this)">SCANNER</a></button>
    <button><a href="perce.php" onclick="setActive(this)">PERCENTAGE</a></button>
    <button><a href="conta.php" onclick="setActive(this)">Contact us</a></button>
    <button><a href="feed.php" onclick="setActive(this)">Feedback</a></button>
    <button><a href="admin_login.php" onclick="setActive(this)">Admin panel</a></button>
    </div>
  </div>

 <!-- Contact / Support Form 
  <div class="contact-container">
    <h2><i class="fas fa-envelope"></i> Contact / Support</h2>
    <form action="send_message.php" method="POST">
      <label>Name</label>
      <input type="text" name="name" required>
      <label>Email</label>
      <input type="email" name="email" required>
      <label>Message</label>
      <textarea name="message" rows="5" required></textarea>
      <button type="submit">Send Message</button>
    </form>
  </div>
-->
  <div class="box">
     
    <h2>📩 Contact / Support</h2>
    <?php if ($success) echo "<p class='success'>$success</p>"; ?>
    <form method="post">
        <label>Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Message</label>
        <textarea name="message" rows="5" required></textarea>

        <button type="submit" name="submit">Send Message</button>
    </form>
</div>


  <!-- Social Contact Info -->
  <div class="social-contact">
    <p><i class="fab fa-facebook-square"></i> Facebook: <a href="https://facebook.com/SLIATE" target="_blank" style="color:white;">facebook.com/SLIATE</a></p>
    <p><i class="fab fa-instagram"></i> Instagram: <a href="https://instagram.com/SLIATE" target="_blank" style="color:white;">@SLIATE</a></p>
    <p><i class="fab fa-whatsapp"></i> WhatsApp: +94 71 234 5678</p>
    <p><i class="fas fa-envelope"></i> Email: info@sliate-attendance.lk</p>
    <p><i class="fas fa-phone"></i> Phone: +94 11 234 5678</p>
  </div>

  <!-- Footer -->
  <footer>
    &copy; 2025 SLIATE Smart Attendance System. All Rights Reserved.
  </footer>

</body>
</html>
