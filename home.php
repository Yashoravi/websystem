<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SLIATE SMART ATTENDANCE SYSTEM</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(to right, lightgreen 20%, lightgray 25%, lightpink 55%, #ffd1dc 100%);
    }

    .navbar {
      display: flex;
      align-items: center;
      background-color: #004d00;
      padding: 10px 20px;
    }

    .logo {
      width: 36px;
      height: 50px;
      margin-right: 15px;
    }

    .title {
      font-family: 'Times New Roman', Times, serif;
      font-weight: bold;
      font-size: 25px;
      color: white;
      flex-grow: 1;
    }

    .navbar a {
      margin-left: 20px;
      margin-right: 10px;
      padding: 5px 5px;
      text-decoration: none;
      background-color: #90ee90;
      color: black;
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

    .main {
      display: flex;
      justify-content: space-between;
      padding: 20px;
    }

    .left-box {
      width: 48%;
    }

    .head-text {
      font-size: 38px;
      font-weight: bold;
      font-family: 'Times New Roman', Times, serif;
      line-height: 1.4;
      text-align: center;
      word-spacing: 8px;
      margin-bottom: 50px;
      margin-top: 100px;
    }

    .description {
      font-size: 20px;
      font-weight: bold;
      line-height: 1.8;
      text-align: justify;
    }

    .right-box {
      width: 48%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .slider img {
      width: 580px;
      height: 500px;
      max-height: 600px;
    }

    /* Info cards section */
    .info-section {
      display: flex;
      justify-content: space-around;
      padding: 40px 20px;
    }

    .info-card {
      width: 25%;
      height: 225px;
      background-size: cover;
      background-color: white;
      background-position: center;
      color: black;
      position: relative;
      border-radius: 10px;
      box-shadow: 0 6px 12px rgba(0,0,0,0.3);
      overflow: hidden;
      padding: 10px;
    }

    .info-title {
      font-size: 22px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .info-description {
      font-size: 15px;
      line-height: 1.6;
    }

    .see-more {
      position: absolute;
      bottom: 20px;
      left: 20px;
      padding: 8px 15px;
      background-color: rgba(0, 0, 0, 0.7);
      border: none;
      color: white;
      border-radius: 5px;
      text-decoration: none;
      font-size: 14px;
    }

    .see-more:hover {
      background-color: #ff69b4;
    }

     .about-us {
            background-color: black;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: 100px;
        }
        .about-us i {
            margin: 0 10px;
        }
        
.qr-icon{
          width: 120px;
          height: 140px;
          display: block;
          margin: 30px 110px;


}

    .footer {
      background-color: #004d00;
      color: white;
      text-align: center;
      padding: 20px 10px;
      font-size: 14px;
      margin-top: 0px;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <img src="dow.jpeg" alt="Logo" class="logo">
    <div class="title">SLIATE</div>
    <a href="home.php" onclick="setActive(this)">HOME</a>

    <a href="log.php" onclick="setActive(this)">SCANNER</a>
    <a href="perce.php" onclick="setActive(this)">PERCENTAGE</a>
    <a href="conta.php" onclick="setActive(this)">Contact us</a>
    <a href="feed.php" onclick="setActive(this)">Feedback</a>
    <a href="admin_login.php" onclick="setActive(this)">Admin panel</a>
  </div>

  <!-- Main Content -->
  <div class="main">
    <div class="left-box">
      <div class="head-text">SLIATE STUDENTS SMART ATTENDANCE SYSTEM</div>
      <div class="description">
        Welcome to Smart Attend – the Smarter Way to Track Student Attendance!  
        Our system offers a fast, secure, and accurate way for universities to monitor student attendance using modern technology. Say goodbye to paper sheets and manual logs!
      </div>
    </div>

    <div class="right-box">
      <div class="slider">
        <img id="slide" src="u.jpg,v.jpg,w.jpg" alt="Slideshow">
      </div>
    </div>
  </div>

  <!-- Info Cards -->
  <div class="info-section">
    <div class="info-card" style="background-image: url('.jpg');">
      <div class="info-title">Subject</div>
      <div class="info-description"><img src="dd.png" alt=" qr" class="qr-icon"><br>
      <br>Host 1 wesite</div>
      <a href="sub.php" class="see-more">See More</a>
    </div>

    <div class="info-card" style="background-image: url('');">
      <div class="info-title">News & Event</div>
      <div class="info-description"> <img src="llm.png" alt=" qr" class="qr-icon"><br><br>Quickly scan and verify students with advanced QR code system.</div>
      <a href="eve.php" class="see-more">See More</a>
    </div>

    <div class="info-card" style="background-image: url('');">
      <div class="info-title">About us</div>
      <div class="info-description"><img src="images.png" alt=" qr" class="qr-icon"><br><br>Generate attendance percentages and detailed analytics instantly.</div>
      <a href="report-info.html" class="see-more">See More</a>
    </div>
  </div>

  <div class="about-us">
    <h3>SLIATE-RATHNAPURA</h3>
    <p>SLIATE Attendance System developed for smarter tracking</p>
    <p>
        <i>📘 Facebook: ATIRathnapura</i> |
        <i>📧 Email: atirathnapura@gmail.com</i> |
        <i>📞 Phone: 045-2222280</i>
    </p>
</div>
  <!-- Footer -->
  <div class="footer">
    &copy; 2025 SLIATE Smart Attendance System. All rights reserved.
  </div>

  <!-- Scripts -->
  <script>
    function setActive(el) {
      const links = document.querySelectorAll(".navbar a");
      links.forEach(link => link.classList.remove("active"));
      el.classList.add("active");
    }

    const images = ["v.jpg", "t.jpg", "o.jpg"];
    let index = 0;
    setInterval(() => {
      index = (index + 1) % images.length;
      document.getElementById("slide").src = images[index];
    }, 2000);
  </script>

</body>
</html>

  
