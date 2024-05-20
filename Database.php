<?php

class Database
{
    private $pdo;

    public function __construct($host, $username, $password, $database)
    {
        $dsn = "mysql:host=$host;dbname=$database";
        $this->pdo = new PDO($dsn, $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
?>
