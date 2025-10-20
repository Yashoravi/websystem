<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SLIATE SMART ATTENDANCE SYSTEM</title>
  <script src="https://unpkg.com/html5-qrcode"></script>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;

  background-image: url('4b.jpg');
  background-size: cover;      /* Fill the entire screen */
  background-position: center; /* Center the image */
  background-repeat: no-repeat;


    }

    /* Navbar */
    .navbar {
      background-color: darkgreen;
      display: flex;
      align-items: center;
      padding: 10px;
    }

    .navbar img {
      height: 50px;
      margin-right: 10px;
    }

    .logo-name {
      color: white;
      font-size: 25px;
      margin-right: auto;
      font-family: 'Times New Roman', Times, serif;
      font-weight: bold;
    }

    .navbar a {
      text-decoration: none;
      font-size:12px;
      background-color: lightgreen;
      color: black;
      padding: 5px 10px;
      margin-left: 15px;
      border-radius: 4px;
      transition: background-color 0.3s;
    }

    .navbar a:active {
      background-color: pink;
    }

    .container {
      display: flex;
      height: calc(100vh - 60px);
    }

    /* QR Scanner Section */
    .scanner-box {
      flex: 3;
      display: flex;
      justify-content: center;
      align-items: center;
    }

   
    #reader {
      width: 300px;
      height: 300px;
      border: 2px solid #333;
    }

    /* Sidebar */
    .sidebar {
      flex: 1;
      background-color:brown;
      font-family: 'Times New Roman', Times, serif;
      color: white;
      padding: 20px;
      
    }

    clock-overlay {
  position: absolute;
  top: 60px; /* height of navbar */
  width: 100%;
  display: flex;
  justify-content: left;
  z-index: 0; /* behind navbar and other content */
}

#clock {
  background: linear-gradient(to right, brown,blue);
  color: white;
  padding: 15px 30px;
  border: 4px white;
  border-radius: 8px;
  font-size: 24px;
  font-weight: bold;
   opacity: 0.8;
}


    .sidebar h3 {
      margin-top: 0;
    }

    .sidebar p {
      margin: 4px 0;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <img src="th (6).jpg" alt="Logo">
    <div class="logo-name">SLIATE</div>
    <a href="myweb.php">Home</a>
    <a href="log.php">Login</a>
    <a href="scanner.php">Scanner</a>
    <a href="percent.php">Percentage</a>
    <a href="#">Update</a>
  </div>

  <!-- Main Layout -->
  <div class="container">
    <!-- QR Scanner Area -->
    <div class="scanner-box">
      <div id="reader"></div>
    </div>

  <div class="clock-overlay">
  <div id="clock">00:00:00</div>
</div

    <!-- Sidebar -->
    <div class="sidebar">
      <h3>About me:</h3>
      <p>Smart Attend is a student attendance management system developed as a final year project by an I am a IT student
       from SLIATE (Sri Lanka Institute of Advanced Technological Education).</p>

       <p>The system uses modern web technologies and database integration to offer real-time
        attendance recording and monitoring. With features like QR code scanning, attendance reports, and easy login access, Smart Attend helps educational institutions move toward smarter, paperless operations.
</p>
<p>As a passionate IT student, my goal with this project is to bring innovation 
into everyday academic processes and contribute to the digital transformation
in education.</p>
<br><br>
<img src="vc.jpg" alt="Sidebar Image" 
    style="width:50%; margin-bottom:5px; border-radius:2px;">

      <h3>Contact:</h3>
      <p>Email: support@sliate.lk</p>
      <p>Phone: +94 11 123 4567</p>

      
    </div>
  </div>

  <script>

  
  function updateClock() {
    const clock = document.getElementById("clock");
    const now = new Date();
    const timeString = now.toLocaleTimeString();
    clock.textContent = timeString;
  }
  setInterval(updateClock, 1000);
  updateClock(); // initial call_user_func

    function onScanSuccess(decodedText, decodedResult) {
      alert("QR Code Scanned: " + decodedText);
    }

    function onScanFailure(error) {
      // Optional: Log or handle scan failure
    }

    const html5QrCode = new Html5Qrcode("reader");

    Html5Qrcode.getCameras().then(devices => {
      if (devices && devices.length) {
        const cameraId = devices[0].id;
        html5QrCode.start(
          cameraId,
          {
            fps: 10,
            qrbox: 250
          },
          onScanSuccess,
          onScanFailure
        );
      }
    }).catch(err => {
      console.error("Camera error: ", err);
    });
  </script>

</body>
</html>