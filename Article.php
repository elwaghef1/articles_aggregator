<?php

class Article
{
    public $name;
    public $sourceName;
    public $content;

    public function __construct($name, $sourceName, $content)
    {
        $this->name = $name;
        $this->sourceName = $sourceName;
        $this->content = $content;
    }
}
?>
