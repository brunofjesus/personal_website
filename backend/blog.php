<?php

class Blog
{
    function __construct($base_url = '')
    {
        $this->base_url = $base_url;
        $this->parser = new Parsedown();
        $this->articles_path = realpath('./articles/') . '/';
    }

    function getArticleList()
    {
        $scanned_directory = scandir($this->articles_path);
        //the index starts at 2, so we need to create a 0-based array //and in reverse order
        $result = array();
        for ($i = sizeof($scanned_directory) - 1; $i > 1; $i--) {
            if ($scanned_directory[$i] != "temp.md") {
                array_push($result, $scanned_directory[$i]);
            }
        }
        return $result;
    }

    function getArticleLink($articlefile)
    {
        $article = substr($articlefile, 0, strpos($articlefile, '.'));
        return $this->base_url . 'index.php/notes/' . $article;
    }

    function getTitle($fileContent)
    {
        return substr($fileContent, 0, strpos($fileContent, "\n"));
    }

    /* Gets the file content */
    function getArticle($article)
    {
        if (strpos($article, '.md') > -1) {
            $article = substr($article, 0, strpos($article, '.md')); //remove .md if we already have it
        }

        if (file_exists($this->articles_path . $article . '.md') === false) {
            return false;
        }

        return file_get_contents($this->articles_path . $article . '.md');
    }

    function markdownToHtml($markdown)
    {
        return $this->parser->text($markdown);
    }

    function getArticleHTML($fileContent)
    {
        if ($fileContent === false) { //file not found
            return false;
        }

        $text = substr($fileContent, strpos($fileContent, "\n") + 1);
        $htmlcontent = $this->markdownToHtml($text);
        return $htmlcontent;
    }
}

?>
