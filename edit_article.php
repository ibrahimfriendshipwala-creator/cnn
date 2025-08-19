<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();

require_once 'db.php';

if (!$conn) {
    die("Database connection failed!");
}

$sql = "SELECT * FROM articles";
$result = $conn->query($sql);

if ($result === false) {
    die("Query failed: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
</head>
<body>
    <h1>Articles</h1>
    <?php while ($row = $result->fetch_assoc()): ?>
        <h2><?= htmlspecialchars($row['title'] ?? 'Untitled') ?></h2>
        <p><?= htmlspecialchars($row['content'] ?? 'No content available.') ?></p>
        <img src="<?= htmlspecialchars($row['image_url'] ?? 'default.jpg') ?>" alt="Article Image">
    <?php endwhile; ?>
</body>
</html>
