<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Feedback Page</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: url('your-background.jpg') no-repeat center center fixed;
      background-size: cover;
      color: white;
    }

    /* Navbar */
    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: darkgreen;
      padding: 10px 20px;
    }
    .navbar img {
      height: 40px;
    }
    .navbar .logo-name {
      font-size: 22px;
      font-weight: bold;
      color: white;
      margin-left: 10px;
    }
    .navbar .nav-buttons a {
      margin-left: 12px;
      padding: 6px 12px;
      background: lightgreen;
      color: black;
      border-radius: 5px;
      font-size:12px;
      text-decoration: none;
    }
    .navbar .nav-buttons a:hover {
      background: pink;
    }

    /* Feedback Form */
    .feedback-container {
      max-width: 700px;
      margin: 50px auto;
      background: rgba(0, 0, 0, 0.6);
      padding: 30px;
      border-radius: 10px;
    }
    .feedback-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group input, textarea {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
    }

    .stars {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }
    .stars input {
      display: none;
    }
    .stars label {
      font-size: 30px;
      color: grey;
      cursor: pointer;
    }
    .stars input:checked ~ label,
    .stars label:hover,
    .stars label:hover ~ label {
      color: gold;
    }

    .submit-btn {
      background: lightgreen;
      color: black;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    /* Submitted Feedback Display */
    .feedback-list {
      margin-top: 30px;
    }
    .feedback-entry {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid #fff;
      border-radius: 8px;
      padding: 15px;
      margin-bottom: 15px;
    }
    .feedback-entry h4 {
      margin: 0;
      color: lightgreen;
    }
    .feedback-entry .stars-display {
      color: gold;
    }
    .feedback-entry p {
      margin: 5px 0;
    }

    /* Footer */
    .footer {
      background-color: darkgreen;
      padding: 20px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      color: white;
      margin-top: 50px;
    }
    .footer-item {
      display: flex;
      align-items: center;
      margin: 10px 0;
    }
    .footer-item img {
      width: 20px;
      height: 20px;
      margin-right: 10px;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <div style="display: flex; align-items: center;">
      <img src="dow.jpeg" alt="Logo">
      <span class="logo-name">SLIATE Smart Attendance</span>
    </div>
    <div class="nav-buttons">

    <a href="home.php" onclick="setActive(this)">HOME</a>

    <a href="log.php" onclick="setActive(this)">SCANNER</a>
    <a href="perce.php" onclick="setActive(this)">PERCENTAGE</a>
    <a href="conta.php" onclick="setActive(this)">Contact us</a>
    <a href="feed.php" onclick="setActive(this)">Feedback</a>
    <a href="admin_login.php" onclick="setActive(this)">Admin panel</a>
      
    </div>
  </div>

  <!-- Feedback Form -->
  <div class="feedback-container">
    <h2>Give Your Feedback 🌟</h2>
    <form id="feedbackForm">
      <div class="form-group">
        <input type="text" id="userName" placeholder="Your Name" required>
      </div>
      <div class="stars">
        <input type="radio" id="star5" name="rating" value="5" />
        <label for="star5">★</label>
        <input type="radio" id="star4" name="rating" value="4" />
        <label for="star4">★</label>
        <input type="radio" id="star3" name="rating" value="3" />
        <label for="star3">★</label>
        <input type="radio" id="star2" name="rating" value="2" />
        <label for="star2">★</label>
        <input type="radio" id="star1" name="rating" value="1" />
        <label for="star1">★</label>
      </div>
      <div class="form-group">
        <textarea id="feedbackText" placeholder="Write your feedback here..." required></textarea>
      </div>
      <button type="submit" class="submit-btn">Submit</button>
    </form>

    <div class="feedback-list" id="feedbackList">
      <!-- Submitted feedback will appear here -->
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <div class="footer-item">
      <img src="fb.png" alt="Facebook"> Facebook Page
    </div>
    <div class="footer-item">
      <img src="wht.jpg" alt="WhatsApp"> +94 77 123 4567
    </div>
    <div class="footer-item">
      <img src="loc.png" alt="Location"> Colombo, Sri Lanka
    </div>
    <div class="footer-item">
      <img src="cll.png" alt="Phone"> +94 11 123 4567
    </div>
    <div class="footer-item">
      <img src="em.png" alt="Email"> info@sliate.lk
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    document.getElementById("feedbackForm").addEventListener("submit", function(e) {
      e.preventDefault();

      const name = document.getElementById("userName").value.trim();
      const ratingInput = document.querySelector('input[name="rating"]:checked');
      const message = document.getElementById("feedbackText").value.trim();

      if (!name || !ratingInput || !message) {
        alert("Please fill out all fields and select a star rating.");
        return;
      }

      const rating = ratingInput.value;
      const stars = "★".repeat(rating) + "☆".repeat(5 - rating);

      const feedbackDiv = document.createElement("div");
      feedbackDiv.className = "feedback-entry";
      feedbackDiv.innerHTML = `
        <h4>${name}</h4>
        <div class="stars-display">${stars}</div>
        <p>${message}</p>
      `;

      document.getElementById("feedbackList").prepend(feedbackDiv);

      // Reset form
      document.getElementById("feedbackForm").reset();
    });
  </script>

</body>
</html>