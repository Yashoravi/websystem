<?php
$conn = new mysqli("localhost", "root", "", "student attendance1");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$subjects = ["Software Engineering", "Web Designing", "Fundamental Programming"];
$subject = isset($_GET['subject']) ? $_GET['subject'] : $subjects[0];

// 1. Get total lectures (LDates) from subjects table
$lecture_sql = "SELECT LDates FROM subjects WHERE subName = '$subject'";
$lecture_result = $conn->query($lecture_sql);
$totalLectures = 20;
if ($lecture_result && $lecture_result->num_rows > 0) {
    $lecture_row = $lecture_result->fetch_assoc();
    $totalLectures = (int)$lecture_row['LDates'];
    if ($totalLectures == 0) $totalLectures = 20;
}

// 2. Get attendance records
$attendance_sql = "
    SELECT StID, StName, COUNT(*) AS Attended
    FROM attendance1
    WHERE States = 'Present' AND Subject = '$subject'
    GROUP BY StID, StName
";
$result = $conn->query($attendance_sql);
$students = [];
while ($row = $result->fetch_assoc()) {
    $attended = $row['Attended'];
    $percentage = round(($attended / $totalLectures) * 100);
    $students[] = [
        'id' => $row['StID'],
        'name' => $row['StName'],
        'attended' => $attended,
        'total' => $totalLectures,
        'percentage' => $percentage
    ];
}

$total = 100;
$count = 7;
$average = $total / $count;




$studentsAtRisk = 0;

$sql = "SELECT COUNT(*) as total FROM attendance_summary WHERE percentage < 75";
$result = $conn->query($sql);

if ($result && $row = $result->fetch_assoc()) {
    $studentsAtRisk = $row['attendanceChart'];
}

$studentCount = 0;

$sql = "SELECT COUNT(*) as total FROM student";  // or your actual table name
$result = $conn->query($sql);

if ($result && $row = $result->fetch_assoc()) {
    $studentCount = $row['total'];
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Attendance Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #d9e4f5, #f5f5f5);
            padding: 30px;
            margin: 0;
        }
        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-radius: 15px;
        }
        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }
        select {
            padding: 8px 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        .cards {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        .card {
            background-color: #e8f4fa;
            border: 2px solid #3498db;
            color: #2c3e50;
            padding: 15px 25px;
            border-radius: 10px;
            width: 220px;
            text-align: center;
        }
        .table-container {
            margin-top: 30px;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }
        th {
            background-color: #3498db;
            color: white;
            padding: 12px;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .excellent {
            color: green;
            font-weight: bold;
        }
        .good {
            color: orange;
            font-weight: bold;
        }
        .risk {
            color: red;
            font-weight: bold;
        }
        #chart {
            margin: 30px auto;
            max-width: 400px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>📊 Attendance Dashboard</h2>

    <form method="get" style="text-align:center;">
        <label><strong>Filter by Subject:</strong></label>
        <select name="subject" onchange="this.form.submit()">
            <?php foreach($subjects as $sub): ?>
                <option value="<?= $sub ?>" <?= ($subject == $sub ? 'selected' : '') ?>><?= $sub ?></option>
            <?php endforeach; ?>
        </select>
    </form>

    <div class="cards">
        <div class="card">
            <h3>Average Attendance</h3>
            <p><?= $average ?>%</p>
        </div>
        <div class="card">
            <h3>Students at Risk</h3>
            <p><?= $studentsAtRisk ?></p>
        </div>
        <div class="card">
            <h3>Total Students</h3>
            <p><?= $studentCount ?></p>
        </div>
    </div>

    <div class="table-container">
        <table>
            <tr>
                <th>Student Name</th>
                <th>Subject</th>
                <th>Attended</th>
                <th>Total</th>
                <th>Percentage</th>
            </tr>
            <?php foreach($students as $stu): ?>
                <tr>
                    <td><?= $stu['name'] ?></td>
                    <td><?= $subject ?></td>
                    <td><?= $stu['attended'] ?></td>
                    <td><?= $stu['total'] ?></td>
                    <td class="<?= ($stu['percentage'] >= 80 ? 'excellent' : ($stu['percentage'] >= 50 ? 'good' : 'risk')) ?>">
                        <?= $stu['percentage'] ?>%
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div id="chart">
        <canvas id="attendanceChart"></canvas>
    </div>
</div>

<script>
    const students = <?= json_encode($students) ?>;
    let excellent = students.filter(s => s.percentage >= 80).length;
    let good = students.filter(s => s.percentage >= 50 && s.percentage < 80).length;
    let risk = students.filter(s => s.percentage < 50).length;

    const ctx = document.getElementById('attendanceChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Excellent (80%+)', 'Good (50-79%)', 'At Risk (<50%)'],
            datasets: [{
                data: [excellent, good, risk],
                backgroundColor: ['#2ecc71', '#f39c12', '#e74c3c'],
                borderColor: ['#fff'],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>

</body>
</html>