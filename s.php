<?php
ob_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['qr_data'])) {
    $conn = new mysqli("localhost", "root", "", "student attendance1");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $data = explode(",", $_POST['qr_data']);

    $stid = $conn->real_escape_string(trim($data[0]));
$stname = $conn->real_escape_string(trim($data[1]));
$states = $conn->real_escape_string(trim($data[2]));
$year = $conn->real_escape_string(trim($data[3]));
$subject = $conn->real_escape_string(trim($data[4])); // New line added for subject
$date = date("Y-m-d");


    if (count($data) < 5) {
        die("Invalid QR format. Expecting: S001,John,Present,2022,Software Engineering");
    }

   

    $sql = "INSERT INTO attendance1 (StID, StName, States, Year, Date,Subject)
            VALUES ('$stid', '$stname', '$states', '$year', '$date','$subject')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ?msg=success");
    } else {
        // Show the SQL error message
        die("SQL Error: " . $conn->error);
    }

    $conn->close();
    exit();
}

ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
    <title>SLIATE SMART ATTENDANCE SYSTEM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('background.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .navbar {
            background-color: darkgreen;
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            align-items: center;
        }
.logo {
      width: 36px;
      height: 50px;
      margin-right: 15px;
    }

        .navbar .logo {
            color: white;
            font-size: 24px;
            font-weight: bold;
            
        }
        .navbar .nav-buttons a {
            color: BLACK;
            background-color: lightgreen;
            padding: 7px 10px;
            text-decoration: none;
            margin-left: 10px;
            border-radius: 4px;
            font-size: 12px;
        }
        .navbar .nav-buttons a:active {
            background-color: pink;
        }
        .clock-container {
            margin: 10px 20px;
            float: right;
            text-align: center;
        }
        .clock {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: #e6a8d7;
            border: 3px solid black;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
        }
        .date {
            margin-top: 5px;
            color: black;
            font-weight: bold;
        }
        #reader {
            width: 400px;
            margin: 40px auto;
        }
.message-box {
    position: fixed;
    bottom: 80px; /* 100px above footer as per your layout */
    left: 100px;
    background-color: darkgreen;
    color: white;
    border: 2px solid black;
    padding: 20px;
    border-radius: 10px;
    font-size: 16px;
    z-index: 1000;
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
        footer {
            background-color: darkgreen;
            color: white;
            padding: 10px;
            text-align: center;
        }
    </style>

    <!-- QR scanner -->
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <img src="dow.jpeg" alt="Logo" class="logo">
    <div class="logo">SLIATE </div>
    <div class="nav-buttons">
        <!--<a href="#">Home</a>
        <a href="#">Students</a>
        <a href="#">Attendance</a>
        <a href="#">Reports</a>
        <a href="#">Settings</a>
        <a href="#">Contact</a>-->
        
    <a href="home.php" onclick="setActive(this)">HOME</a>

    <a href="s.php" onclick="setActive(this)">SCANNER</a>
    <a href="perce.php" onclick="setActive(this)">PERCENTAGE</a>
    <a href="conta.php" onclick="setActive(this)">CONTACT US</a>
    <a href="feed.php" onclick="setActive(this)">FEEDBACK</a>
    <a href="admin_login.php" onclick="setActive(this)">ADMIN PANEL</a>
    </div>
</div>

<!-- Clock and Date -->
<div class="clock-container">
    <div class="clock" id="clock"></div>
    <div class="date" id="date"></div>
</div>


<!-- Message Box -->
<?php if (isset($_GET['msg'])): ?>
    <div id="messageBox" class="message-box">
        QR Code read successfully!<br>
        I'm updating your attendance. Thank you!!
    </div>

    <script>
        // Automatically hide message after 3 seconds
        setTimeout(function () {
            var box = document.getElementById('messageBox');
            if (box) {
                box.style.display = 'none';
            }
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>
<?php endif; ?>

<!-- QR Scanner -->
<div id="reader"></div>

<!-- About Us -->
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
<footer>
    &copy; 2025 SLIATE Smart Attendance System. All rights reserved.
</footer>

<!-- Real-Time Clock Script -->
<script>
    function updateClock() {
        const now = new Date();
        const timeStr = now.toLocaleTimeString();
        const dateStr = now.toLocaleDateString('en-GB', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
        });
        document.getElementById('clock').textContent = timeStr;
        document.getElementById('date').textContent = dateStr.replace(/^(\d+)/, '$1th of');
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>

<!-- QR Scanner Script -->
<script>
    function onScanSuccess(decodedText) {
        const form = document.createElement("form");
        form.method = "POST";
        form.action = "";

        const input = document.createElement("input");
        input.type = "hidden";
        input.name = "qr_data";
        input.value = decodedText;
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }

    const html5QrCode = new Html5Qrcode("reader");
    Html5Qrcode.getCameras().then(devices => {
        if (devices.length) {
            html5QrCode.start(
                { facingMode: "environment" },
                { fps: 10, qrbox: 250 },
                onScanSuccess
            );
        }
    });
</script>


</body>
</html>