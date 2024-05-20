<?php

require_once 'Database.php';

class ArticleRepository
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getAllArticles()
    {
        $sql = "SELECT a.name AS article_name, s.name AS source_name, a.content
                FROM article a
                JOIN source s ON a.source_id = s.id";
        $stmt = $this->db->query($sql);
        $articles = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new Article($row['article_name'], $row['source_name'], $row['content']);
        }
        return $articles;
    }
}
?>
