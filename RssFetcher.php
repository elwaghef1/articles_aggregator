<?php

require_once 'Article.php';

class RssFetcher
{
    public function fetch($sourceName, $feedUrl)
    {
        $rss = simplexml_load_file($feedUrl);
        if ($rss === false) {
            throw new Exception("Error loading RSS feed");
        }

        $articles = [];
        foreach ($rss->channel->item as $item) {
            $articles[] = new Article((string)$item->title, $sourceName, (string)$item->description);
        }
        return $articles;
    }
}
?>
