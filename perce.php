<?php
$conn = new mysqli("localhost", "root", "", "student attendance1");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$subjects = ["Software Engineering", "Web Designing", "Fundamental Programming"];
$subject = isset($_GET['subject']) ? $_GET['subject'] : $subjects[0];

// 1. Get total lectures (LDates) from subjects table
$lecture_sql = "SELECT LDates FROM subjects WHERE subName = '$subject'";
$lecture_result = $conn->query($lecture_sql);
$totalLectures = 1;
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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Attendance</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f8fb;
            padding: 40px;
        }
        .container {
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            max-width: 800px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 10px;
            color: #2c3e50;
        }
        p {
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #e3ecf5;
            text-align: left;
            padding: 10px;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .percent {
            font-weight: bold;
        }
        .green { color: green; }
        .orange { color: orange; }
        .red { color: red; }
    </style>
</head>
<body>
<div class="container">
    <h2>Student Records</h2>
    <p>A detailed list of students and their attendance records for the selected subject.</p>
    <form method="get">
        <label>Select Subject:</label>
        <select name="subject" onchange="this.form.submit()">
            <?php foreach ($subjects as $sub): ?>
                <option value="<?= $sub ?>" <?= $sub == $subject ? 'selected' : '' ?>><?= $sub ?></option>
            <?php endforeach; ?>
        </select>
    </form>
    <table>
        <tr>
            <th>Student Name</th>
            <th>Subject</th>
            <th>Attended</th>
            <th>Total</th>
            <th>Percentage</th>
        </tr>
        <?php foreach ($students as $stu): ?>
            <tr>
                <td><?= $stu['name'] ?></td>
                <td><?= $subject ?></td>
                <td><?= $stu['attended'] ?></td>
                <td><?= $stu['total'] ?></td>
                <td class="percent <?= $stu['percentage'] >= 80 ? 'green' : ($stu['percentage'] >= 50 ? 'orange' : 'red') ?>">
                    <?= $stu['percentage'] ?>%
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
