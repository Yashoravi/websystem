
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SLIATE SMART ATTENDANCE SYSTEM</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    /* Navbar */
    .navbar {
      display: flex;
      align-items: center;
      background-color: green;
      padding: 10px 20px;
    }

    .navbar img {
      height: 40px;
    }

    .logo-text {
      color: white;
      margin-left: 10px;
      font-size: 25px;
       font-family:times ;
      font-weight: bold;
    }

    .navbar-buttons {
      margin-left: auto;
      display: flex;
    }

    .navbar-buttons button {
      background-color: lightgreen;
      border: none;
      padding: 5px 5px;
      font-size: 12px;
      margin-left: 12px;
      cursor: pointer;
      font-weight: bold;
    }

    .navbar-buttons button.active {
      background-color: pink;
    }

    /* Heading */
    h2 {
      color: black;
      font-weight: bold;
      margin-top: 20px;
       font-family:times ;
      text-align: center;
    }

    /* Table Styling */
    table {
      margin: 20px auto;
      border-collapse: collapse;
      border: 2px solid black;
      width: 90%;
    }

    th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: lightgreen;
    }

    tbody tr {
      background-color: lightpink;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <img src="dow.jpeg" alt="SLIATE Logo" />
    <div class="logo-text">SLIATE</div>
    <div class="navbar-buttons">
      <button onclick="setActive(this)"> <a href="home.php">HOME</a> </button>
      <button onclick="setActive(this)"><a href="log.php">LOGIN</a></button>
      <button onclick="setActive(this)"><a href="s.php">SCANNER</a></button>
      <button class="active" onclick="setActive(this)">PERCENTAGE</button>
      <button onclick="setActive(this)"><a href="#">UPDATE</a></button>

     

    </div>
  </div>

  <!-- Heading -->
  <h2>Percentage Table</h2>

  <!-- Percentage Table -->
  <table id="percentageTable">
    <thead>
      <tr>
        <th>StID</th>
        <th>SName</th>
        <th>SE %</th>
        <th>WP %</th>
        <th>English %</th>
        <th>ML %</th>
      </tr>
    </thead>
    <tbody>
      <!-- Sample rows -->
      <tr><td>ST001</td><td>John</td><td>60</td><td>62</td><td>55</td><td>61</td></tr>
      <tr><td>ST002</td><td>Jane</td><td>53</td><td>58</td><td>59</td><td>60</td></tr>
      <tr><td>ST003</td><td>Ali</td><td>54</td><td>57</td><td>52</td><td>64</td></tr>
      <tr><td>ST004</td><td>Mary</td><td>60</td><td>63</td><td>61</td><td>62</td></tr>
      <tr><td>ST005</td><td>Tom</td><td>55</td><td>60</td><td>58</td><td>61</td></tr>
      <tr><td>ST006</td><td>Anna</td><td>57</td><td>59</td><td>60</td><td>62</td></tr>
      <tr><td>ST007</td><td>Nick</td><td>51</td><td>53</td><td>55</td><td>57</td></tr>
      <tr><td>ST008</td><td>Sara</td><td>50</td><td>52</td><td>53</td><td>54</td></tr>
      <tr><td>ST009</td><td>Leo</td><td>52</td><td>54</td><td>56</td><td>58</td></tr>
      <tr><td>ST010</td><td>Kely</td><td>59</td><td>60</td><td>61</td><td>62</td></tr>
    </tbody>
  </table>

  <script>
    // Active navbar button logic
    function setActive(btn) {
      document.querySelectorAll('.navbar-buttons button').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    }

    // Start percentage auto update if all percentages are >50 and <65
    function shouldStartUpdating() {
      const rows = document.querySelectorAll('#percentageTable tbody tr');
      return Array.from(rows).every(row => {
        const cells = row.querySelectorAll('td');
        return [2, 3, 4, 5].every(i => {
          const value = parseFloat(cells[i].textContent);
          return value > 50 && value < 65;
        });
      });
    }

    function updatePercentages() {
      const rows = document.querySelectorAll('#percentageTable tbody tr');
      rows.forEach(row => {
        const cells = row.querySelectorAll('td');
        for (let i = 2; i <= 5; i++) {
          let value = parseFloat(cells[i].textContent);
          value = Math.min(value + Math.random() * 2, 100); // Increment slightly
          cells[i].textContent = value.toFixed(1);
        }
      });
    }

    if (shouldStartUpdating()) {
      setInterval(updatePercentages, 3000); // Update every 3 seconds
    }
  </script>

</body>
</html>