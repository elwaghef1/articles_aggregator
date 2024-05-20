<?php

require_once 'ArticleAggregator.php';

// Création de l'agrégateur d'articles
$a = new ArticleAggregator();

/**
 * Récupère les articles d'un flux rss donné
 * source name, feed url
 */
$a->appendRss('Le Monde', 'http://www.lemonde.fr/rss/une.xml');

$articles = $a->getArticles();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles du Flux RSS</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Articles du Flux RSS</h1>
    </header>
    <div class="container">
        <?php foreach ($articles as $article): ?>
            <h2><?php echo htmlspecialchars($article->name, ENT_QUOTES, 'UTF-8'); ?></h2>
            <em><?php echo htmlspecialchars($article->sourceName, ENT_QUOTES, 'UTF-8'); ?></em>
            <p><?php echo nl2br(htmlspecialchars($article->content, ENT_QUOTES, 'UTF-8')); ?></p>
        <?php endforeach; ?>
    </div>
    <footer>
        <p>&copy; 2024 Agrégateur d'Articles</p>
    </footer>
</body>
</html>
