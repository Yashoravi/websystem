<?php
include 'img/phpqrcode.php'; // QR Code library

$conn = new mysqli("localhost", "root", "", "student attendance1");
if ($conn->connect_error) {
    die("DB connection failed: " . $conn->connect_error);
}

// Create a folder for QR codes if it doesn't exist
$qrDir = "qrcodes/";
if (!file_exists($qrDir)) {
    mkdir($qrDir);
}

$students = $conn->query("SELECT * FROM student");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Generate QR Codes</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f5f5f5; }
        h2 { color: darkgreen; }
        .student-box { display: inline-block; border: 1px solid #ccc; padding: 15px; margin: 10px; background: white; width: 200px; text-align: center; }
        .qr-img { margin-top: 10px; }
    </style>
</head>
<body>

<h2>🆔 Generate QR Codes for Students</h2>

<?php while($row = $students->fetch_assoc()): 
    $qrText = $row['StID'] . "|" . $row['StName'] . "|" . $row['Department']; // secret encoded data
    $fileName = $qrDir . $row['StID'] . ".png";
    QRcode::png($qrText, $fileName, QR_ECLEVEL_L, 4);
?>
    <div class="student-box">
        <strong><?= $row['StName'] ?></strong><br>
        <?= $row['StID'] ?><br>
        <?= $row['Department'] ?><br>
        <img class="qr-img" src="<?= $fileName ?>" width="150"><br>
        <a href="<?= $fileName ?>" download>⬇ Download QR</a>
    </div>
<?php endwhile; ?>

</body>
</html>