<?php
// ✅ Database Connection
$conn = new mysqli("localhost", "root", "", "student attendance1");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// ✅ Get Form Data
$system_name = $_POST['system_name'];
$theme = $_POST['theme'];
$scan_mode = $_POST['scan_mode'];
$contact_email = $_POST['contact_email'];
$support_note = $_POST['support_note'];

// ✅ Insert or Update settings (only 1 row with ID = 1)
$sql = "INSERT INTO system_settings (id, system_name, theme, scan_mode, contact_email, support_note)
        VALUES (1, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE
        system_name = VALUES(system_name),
        theme = VALUES(theme),
        scan_mode = VALUES(scan_mode),
        contact_email = VALUES(contact_email),
        support_note = VALUES(support_note)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $system_name, $theme, $scan_mode, $contact_email, $support_note);

if ($stmt->execute()) {
  echo "<h2>✅ System settings saved successfully.</h2>";
  echo "<a href='set.php'>Go Back</a>";
} else {
  echo "❌ Error: " . $stmt->error;
}

$conn->close();
?>
