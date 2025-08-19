<?php
require 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die("Article not found!");
}

$query = $pdo->prepare("SELECT * FROM articles WHERE article_id = ?");
$query->execute([$id]);
$article = $query->fetch();

if (!$article) {
    die("Article not found!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $article['title'] ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        header {
            margin-bottom: 20px;
        }
        header h1 {
            font-size: 2em;
            margin: 0;
        }
        img {
            max-width: 100%;
            border-radius: 10px;
        }
        p {
            line-height: 1.6;
            margin-top: 15px;
        }
        a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1><?= $article['title'] ?></h1>
    </header>
    <main>
        <img src="<?= $article['image_url'] ?>" alt="Article Image">
        <p><?= $article['content'] ?></p>
        <a href="index.php">Back to Homepage</a>
    </main>
</body>
</html>
