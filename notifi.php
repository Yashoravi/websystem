<?php
session_start();
$conn = new mysqli("localhost", "root", "", "student attendance1");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Send announcement
if (isset($_POST['send'])) {
    $target = $_POST['target'];
    $title = $conn->real_escape_string($_POST['title']);
    $message = $conn->real_escape_string($_POST['message']);
    $date = date('Y-m-d H:i:s');

    $conn->query("INSERT INTO notifications (target, title, message, date_sent) VALUES ('$target', '$title', '$message', '$date')");
    $success = "📣 Message sent successfully!";
}

// Get messages
$inbox = $conn->query("SELECT * FROM contact_messages ORDER BY date_sent DESC");
$announcements = $conn->query("SELECT * FROM notifications ORDER BY date_sent DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Notifications | Admin Panel</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f4f4f4; }
        h2 { color: darkgreen; }
        .form-box, .table-box { background: white; padding: 20px; margin-bottom: 30px; border-radius: 10px; }
        textarea, input[type=text], select { width: 100%; padding: 10px; margin-top: 10px; border-radius: 6px; }
        .btn { background: darkgreen; color: white; padding: 10px 20px; margin-top: 10px; border: none; border-radius: 6px; cursor: pointer; }
        .success { color: green; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; }
        th { background: #eee; }
    </style>
</head>
<body>

    <h2>✉ Send Announcement</h2>
    <div class="form-box">
        <?php if (isset($success)) echo "<p class='success'>$success</p>"; ?>
        <form method="post">
            <label>Target Audience:</label>
            <select name="target" required>
                <option value="all">All</option>
                <option value="students">Students</option>
                <option value="lecturers">Lecturers</option>
            </select>

            <label>Title:</label>
            <input type="text" name="title" required>

            <label>Message:</label>
            <textarea name="message" rows="5" required></textarea>

            <button class="btn" name="send">Send Message</button>
        </form>
    </div>

    <h2>📬 Contact / Support Inbox</h2>
    <div class="table-box">
        <table>
            <tr>
                <th>Name</th><th>Email</th><th>Message</th><th>Date</th>
            </tr>
            <?php while ($row = $inbox->fetch_assoc()): ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['message'] ?></td>
                <td><?= $row['date_sent'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <h2>📢 Sent Announcements</h2>
    <div class="table-box">
        <table>
            <tr>
                <th>Target</th><th>Title</th><th>Message</th><th>Date Sent</th>
            </tr>
            <?php while ($row = $announcements->fetch_assoc()): ?>
            <tr>
                <td><?= $row['target'] ?></td>
                <td><?= $row['title'] ?></td>
                <td><?= $row['message'] ?></td>
                <td><?= $row['date_sent'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>
</html>