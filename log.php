<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - SLIATE SMART ATTENDANCE SYSTEM</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      display: flex;
  flex-direction: column;
      height: 100%;

      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      height: 100vh;
      background: url('j.jpg ') no-repeat center center fixed;
      background-size: cover;
      padding-top: 80px; /* Push content below navbar */
    }

    /* Navbar */
    .navbar {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: #004d00;
      display: flex;
      align-items:center;
      justify-content: space-between;
      
      z-index: 1000;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
      padding: 10px 30px;
       font-size: 25px;
    }

    


    .navbar .logo {
      color: white;
      font-size: 25px;
      font-align:right;
      font-family: 'Times New Roman', Times, serif;
      
      font-weight: bold;
    }

.logo {
      width: 35px;
      height: 50px;
      margin-right: 15px;
    }

    .navbar .nav-buttons {
      display: flex;
      gap: 14px;
    }

    .navbar .nav-buttons button {
      background-color: lightgreen;
      border: none;
      color: white;
      padding: 8px 8px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 10px;
      font-family:times ;
      font-weight: bold;
      transition: background-color 0.3s ;
    }

    .navbar .nav-buttons button:hover {
      background-color: #ff69b4; /* Pink on hover */
    }

    .container {
      display: flex;
      align-items: center;
      justify-content: right;
       margin-right: 35px;
      height: calc(100vh - 75px);
     
    }

    .login-box {
      position: relative;
      background-color: rgba(220, 190, 190, 0.95);
      padding: 40px;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
      max-width: 400px;
      width: 100%;
      z-index: 1;
      overflow: hidden;
    }

    .login-box::before {
      content: '';
      position: absolute;
      width: 200%;
      height: 200%;
      top: 100%;
      left: -50%;
      background: rgba(6, 148, 103, 0.2);
      border-radius: 45%;
      animation: wave 10s infinite linear;
      z-index: -1;
    }

    @keyframes wave {
      0% { top: 100%; }
      100% { top: -20%; }
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 30px;
      color: darkgreen;
    }

    .login-box label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    .login-box input {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    .toggle-password {
      position: relative;
      top: -45px;
      float: right;
      right: 10px;
      cursor: pointer;
      font-size: 14px;
      color: #888;
    }

    .login-box button {
      width: 100%;
      padding: 12px;
      background-color: #2aa37c;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .login-box button:hover {
      background-color: #218d6a;
    }

    .login-box .footer {
      text-align: center;
      margin-top: 20px;
      font-size: 15px;
      color: #666;
    }

    footer {
            background-color: darkgreen;
            color: white;
            padding: 8px;
            margin-top: auto;
            text-align: center;
        }
  </style>
</head>
<body>

 
<!-- Navbar -->
  <div class="navbar">
  <img src="dow.jpeg" alt="Logo" class="logo">
    <div class="logo">SLIATE </div>
    <div class="nav-buttons">
     <button> <a href="home.php" onclick="setActive(this)">HOME</a></button>
    
    <button>  <a href="log.php" onclick="setActive(this)">SCANNER</a></button>
    <button>  <a href="perce.php" onclick="setActive(this)">PERCENTAGE</a></button>
    <button>  <a href="conta.php" onclick="setActive(this)">CONTACT US</a></button>
    <button>  <a href="feed.php" onclick="setActive(this)">FEEDBACK</a></button>
    <button>  <a href="admin_login.php" onclick="setActive(this)">ADMIN PANEL</a></button>
    </div>
  </div>


  <!-- Login Form -->
  <div class="container">
    <div class="login-box">
      <h2>Login</h2>
      <form onsubmit="return validateLogin(event)">
  <label for="username">Username</label>
  <input type="text" id="username" placeholder="Enter your username" required />

  <label for="password">Password</label>
  <input type="password" id="password" placeholder="Enter your password" required />
  <span class="toggle-password" onclick="togglePassword()">Show</span>

  <button type="submit">Login</button>
</form>
     <footer>
    &copy; SLIATE Smart Attendance System
</footer>
    </div>
  </div>
  <footer>
    &copy; 2025 SLIATE Smart Attendance System. All rights reserved.
</footer>

  <script>
  function togglePassword() {
    const password = document.getElementById('password');
    const toggle = document.querySelector('.toggle-password');
    if (password.type === 'password') {
      password.type = 'text';
      toggle.textContent = 'Hide';
    } else {
      password.type = 'password';
      toggle.textContent = 'Show';
    }
  }

  function validateLogin(event) {
    event.preventDefault(); // Prevent form from submitting

    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value;

    if (username === "yashora" && password === "yash12") {
      window.location.href = "s.php"; // Redirect to update.php
    } else {
      alert("Password Incorrect");
    }

    return false;
  }
</script>

</body>
</html>