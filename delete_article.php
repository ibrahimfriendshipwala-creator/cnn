<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

require 'db.php';

if (isset($_GET['id'])) {
    $article_id = $_GET['id'];

    // Delete the article
    $stmt = $conn->prepare("DELETE FROM articles WHERE article_id = ?");
    $stmt->bind_param("i", $article_id);

    if ($stmt->execute()) {
        header('Location: admin_panel.php');
        exit();
    } else {
        echo "Failed to delete the article.";
    }
} else {
    header('Location: admin_panel.php');
    exit();
}
?>
