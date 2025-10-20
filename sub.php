<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Interactive Info Page</title>
  <style>
    body {
      display: flex;
  flex-direction: column;
   height: 100%;
      margin: 0;
      font-family: Arial, sans-serif;
      background: url('ll.jpg') no-repeat center center fixed;
      background-size: cover;
    }

    /* Navbar */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 20px;
      background-color: darkgreen;
      color: white;
    }

    .logo {
      display: flex;
      align-items: center;
    }

    .logo img {
      width: 25px;
      height: 30px;
      margin-right: 10px;
    }

    .nav-buttons {
      display: flex;
      gap: 15px;
    }

    .nav-buttons button {
      background-color: white;
      color: darkgreen;
      border: none;
      padding: 8px 15px;
      border-radius: 4px;
      cursor: pointer;
    }

    .nav-buttons button:hover {
      background-color: lightgreen;
    }

    .card-container {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 50px;
  color: black;
  margin-top: 50px;   /* 👈 Creates space below the navbar */
  padding: 0 20px;
  max-width: 1200px;
  margin-left: auto;
  margin-right: auto;
  margin-bottom: 600px;
}

.description {
  color:rgb(33, 31, 33); /* Change this color code to your desired color */
}



    /* Card Container */
   /* .card-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
      margin-top:200px;
      margin: 160px auto;
      padding: 0 20px;
      max-width: 1200px;
       padding: 15px;
  color: white;
    }*/
    .card {
  background-color: rgba(255, 255, 255, 0.2); /* Transparent white */
  backdrop-filter: blur(6px);                /* Optional: adds blur to background */
  width: 250px;
  height: 300px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  overflow: hidden;
  transition: transform 0.3s ease, max-height 0.3s ease;
  cursor: pointer;
  
  position: relative;
  max-height: 450px;
  color: black; /* Makes text white for contrast */
}


/*
    .card {
      background-color: rgba(255, 255, 255, 0.95);
      width: 300px;
      height: 500px;
      border-radius: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      overflow: hidden;
      transition: transform 0.3s ease, max-height 0.3s ease;
      cursor: pointer;
      position: relative;
      max-height: 450px;
    }*/
    .card-content {
  padding: 15px;
  color: white;
}

.full-desc, .short-desc {
  color: white;
}

    .card:hover {
      transform: translateY(-10px);
    }

    .card.expanded {
      width: 100%;
      max-height: 800px;
    }

    .card img {
      width: 40%;
      height: 110px;
      object-fit: cover;
      color:black;
    }

    .card-content {
      padding: 15px;
    }

    .short-desc {
      font-size: 16px;
      margin-bottom: 10px;
    }

    .full-desc {
      display: none;
      font-size: 14px;
      color: #333;
    }

    .card.expanded .full-desc {
      display: block;
    }

    .card.expanded .short-desc {
      display: none;
    }

    .qr-icon{
          width: 120px;
          height: 140px;
          display: block;
          margin: 30px 110px;
    }
    footer {
     
            background-color: darkgreen;
            color: white;
            padding: 8px;
            text-align: center;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <div class="logo">
      <img src="dow.jpeg" alt="Logo" />
      <span>SLIATE</span>
    </div>
    <div class="nav-buttons">
      <button><a href="home.php" onclick="setActive(this)">Home</a></button>
      <button><a href="log.php" onclick="setActive(this)">About</a></button>
      <button><a href="s.php" onclick="setActive(this)">Services</a></button>
      <button><a href="percent.php" onclick="setActive(this)">Projects</a></button>
      <button><a href="update.php" onclick="setActive(this)">Blog</a></button>
      <button><a href="home.php" onclick="setActive(this)">Contact</a></button>
    </div>
  </div>

  <!-- Card Section -->
  <div class="card-container">
    <!-- Card 1: Software Engineering -->
    <div class="card" onclick="toggleCard(this)">
        <br>
      <b>  Software Engineering </b>
      <div class="card-content">
        <div class="short-desc"> 
            <img src="fbbb.png" alt="Software Engineering" class="qr-icon"/>

         <p class="description"> Learn about Software Engineering practices and methods.</p>
        </div>
        <div class="full-desc">
          Software engineering is the systematic application of engineering principles to the development of software. It includes planning, designing, developing, testing, and maintaining software systems. It ensures reliability, scalability, and performance in software products, and follows standards and best practices for quality assurance.
        </div>
      </div>
    </div>

    <!-- Card 2: Fundamental Programming -->
    <div class="card" onclick="toggleCard(this)">
        <br>
      <b>  Fundamental Programming</b>
      <div class="card-content">
        <div class="short-desc">
            <img src="w3s.jpeg" alt="Fundamental Programming" class="qr-icon"/><br>
            
          <p class="description">Understand the basics of coding and logic building.</p>
        </div>
        <div class="full-desc">
          Fundamental programming covers the basics of computer programming including data types, variables, control structures, loops, functions, and basic algorithms. It's essential for problem-solving and forms the foundation for all advanced development work in various languages such as Python, C++, and JavaScript.
        </div>
      </div>
    </div>
     
    <!-- Card 3: Web Development -->
    <div class="card" onclick="toggleCard(this)">
        <br>
      <b>  Web Development</b>
      <div class="card-content">
        <div class="short-desc">
            <img src="www.jpeg" alt="Software Engineering" class="qr-icon"/><br>
         <p class="description"> Discover how websites and web apps are built.</p>
        </div>
        <div class="full-desc">
          Web development involves building and maintaining websites. It includes frontend development (HTML, CSS, JavaScript) for the user interface and backend development (Node.js, PHP, databases) for server-side logic. Modern web development also uses frameworks like React, Angular, and backend systems like Express or Laravel.
        </div>
      </div>
    </div>
  </div>

   <footer>
    &copy; 2025 SLIATE Smart Attendance System. All rights reserved.
</footer>

  <!-- JavaScript -->
  <script>
    function toggleCard(card) {
      card.classList.toggle("expanded");
    }
  </script>

</body>
</html>
