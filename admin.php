<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once 'db.php'; // Include database connection

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $image_url = $_POST['image_url']; // Assume an image link is provided

    // Validate inputs
    if (!empty($title) && !empty($description) && !empty($category) && !empty($image_url)) {
        // Insert article into the database
        $stmt = $conn->prepare("INSERT INTO articles (title, description, category, image_url) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $description, $category, $image_url);

        if ($stmt->execute()) {
            $success = "Article added successfully!";
        } else {
            $error = "Failed to add article. Please try again.";
        }
    } else {
        $error = "All fields are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Add Article</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        .message {
            text-align: center;
            margin-bottom: 10px;
            color: green;
        }
        .error {
            text-align: center;
            margin-bottom: 10px;
            color: red;
        }
        input, textarea, select, button {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Add New Article</h1>

        <!-- Display Messages -->
        <?php if (isset($success)): ?>
            <p class="message"><?= htmlspecialchars($success) ?></p>
        <?php elseif (isset($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="title" placeholder="Title" required>
            <textarea name="description" placeholder="Description" rows="5" required></textarea>
            <input type="text" name="category" placeholder="Category" required>
            <input type="text" name="image_url" placeholder="Image URL" required>
            <button type="submit">Add Article</button>
        </form>
    </div>
</body>
</html>
