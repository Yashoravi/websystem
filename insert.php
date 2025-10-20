<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SLIATE SMART ATTENDANCE SYSTEM - Percentage</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom right, lightgreen, lightpink);
    }

    /* Navbar Styling */
    .navbar {
      display: flex;
      align-items: center;
      background-color: green;
      padding: 10px 20px;
    }

    .navbar img {
      height: 40px;
      width: auto;
    }

    .navbar-title {
      color: white;
      font-weight: bold;
      margin-left: 10px;
      font-size: 25px;
       font-family:times ;
    }

    .navbar-buttons {
      margin-left: auto;
    }

    .navbar-buttons a {
      background-color: lightgreen;
      color: black;
      padding: 6px 9px;
      margin-left: 10px;
      font-size: 10px;
       font-family:times ;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .navbar-buttons a.active,
    .navbar-buttons a:focus,
    .navbar-buttons a:active {
      background-color: pink;
      color: black;
    }

    /* Heading Styling */
    h1 {
      text-align: center;
      color: black;
      font-weight: bold;
      margin-top: 20px;
      margin-bottom: 40px;
    }

    /* Form Styling */
    .form-container {
      display: flex;
      justify-content: space-around;
      padding: 20px;
    }

    .form-box {
      background-color: white;
      border: 2px solid black;
      padding: 20px;
      width: 400px;
      border-radius: 10px;
    }

    .form-box h2 {
      text-align: center;
      color: black;
      margin-bottom: 20px;
    }

    .form-box label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-box input,
    .form-box select {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-box button {
      width: 100%;
      padding: 10px;
      background-color: lightgreen;
      color: black;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
    }

    .form-box button:hover {
      background-color: pink;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <img src="dow.jpeg" alt="SLIATE Logo">
    <div class="navbar-title">SLIATE</div>
    <div class="navbar-buttons">
      <a href="home.php">HOME</a>
      <a href="log.php">LOGIN</a>
      <a href="s.php">SCANNER</a>
      <a href="percent.php" class="active">PERCENTAGE</a>
      <a href="update.php">UPDATE</a>
    </div>
  </div>

  <!-- Heading -->
  <h1>Update Details</h1>

  <!-- Forms -->
  <div class="form-container">
    <!-- Add Students Form -->
    <div class="form-box">
      <h2>Add Students</h2>
      <form action="Insert.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="StID">Student ID:</label>
        <input type="text" name="StID" required>

        <label for="Gender">Gender:</label>
        <select name="Gender" required>
          <option value="">Select</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>

        <label for="Address">Address:</label>
        <input type="text" name="Address" required>

        <button type="submit">Update</button>
      </form>
    </div>

    <!-- Remove Students Form -->
    <div class="form-box">
      <h2>Remove Students</h2>
      <form action="remove.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="stid">Student ID:</label>
        <input type="text" name="stid" required>

        <button type="submit">Remove</button>
      </form>
    </div>
  </div>

</body>
</html>