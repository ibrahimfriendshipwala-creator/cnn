<?php
require_once 'db.php'; // Include database connection

// Fetch articles
$stmt = $conn->prepare("SELECT * FROM articles ORDER BY created_at DESC");
$stmt->execute();
$result = $stmt->get_result();

$articles = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Articles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .article-container {
            max-width: 800px;
            margin: auto;
        }
        .article {
            background: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .article img {
            max-width: 100%;
            border-radius: 8px;
        }
        .article h2 {
            margin: 0 0 10px;
        }
        .article p {
            margin: 0;
        }
        .article .category {
            font-style: italic;
            color: gray;
        }
    </style>
</head>
<body>
    <div class="article-container">
        <h1>Latest News</h1>

        <?php if (count($articles) > 0): ?>
            <?php foreach ($articles as $article): ?>
                <div class="article">
                    <h2><?= htmlspecialchars($article['title']) ?></h2>
                    <p class="category"><?= htmlspecialchars($article['category']) ?></p>
                    <img src="<?= htmlspecialchars($article['image_url']) ?>" alt="Article Image">
                    <p><?= htmlspecialchars($article['description']) ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No articles found!</p>
        <?php endif; ?>
    </div>
</body>
</html>
