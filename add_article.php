<?php
session_start();
require_once 'db.php'; // Include database connection

// Check if the user is logged in as an admin
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: admin_login.php'); // Redirect to login page if not logged in
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the article input
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Validate input
    if (!empty($title) && !empty($content)) {
        // Insert article into the database
        $stmt = $conn->prepare("INSERT INTO articles (title, content) VALUES (?, ?)");
        $stmt->bind_param('ss', $title, $content);

        // Execute and check if insertion is successful
        if ($stmt->execute()) {
            header('Location: admin_panel.php'); // Redirect to admin panel if successful
            exit();
        } else {
            $error = 'Failed to add article.';
        }
    } else {
        $error = 'Please fill all fields.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Article</title>
    <style>
        <?php include 'style.css'; ?>
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add New Article</h1>

        <!-- Display error message if any -->
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="title" placeholder="Title" required>
            <textarea name="content" placeholder="Content" required></textarea>
            <button type="submit">Add Article</button>
        </form>
    </div>
</body>
</html>
