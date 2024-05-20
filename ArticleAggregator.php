<?php

require_once 'Database.php';
require_once 'Article.php';
require_once 'ArticleRepository.php';
require_once 'RssFetcher.php';

class ArticleAggregator
{
    private $articles = [];

    public function appendArticles(array $articles): void
    {
        $this->articles = array_merge($this->articles, $articles);
    }

    public function appendDatabase($host, $username, $password, $database): void
    {
        try {
            $db = new Database($host, $username, $password, $database);
            $articleRepository = new ArticleRepository($db);
            $articlesFromDb = $articleRepository->getAllArticles();
            $this->appendArticles($articlesFromDb);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function appendRss($sourceName, $feedUrl): void
    {
        try {
            $rssFetcher = new RssFetcher();
            $articlesFromRss = $rssFetcher->fetch($sourceName, $feedUrl);
            $this->appendArticles($articlesFromRss);
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function getArticles(): array
    {
        return $this->articles;
    }
}
?>
