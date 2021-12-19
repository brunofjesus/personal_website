<?php

namespace App\backend;

use App\backend\model\Article;

class Blog
{

    private static $instance = null;

    static function getInstance(): ?Blog
    {
        if (isset(self::$instance) == false) {
            self::$instance = new Blog();
        }

        return self::$instance;
    }

    function __construct()
    {
    }

    /**
     * @return Article[]
     */
    function retrieveArticleList(): array
    {
        $articles = [];

        $fileList = $this->retrieveArticleFileList(ARTICLES_PATH);

        foreach ($fileList as $fileName) {
            $articles[] = $this->retrieveArticleFromFileName($fileName);
        }

        return $articles;
    }

    /**
     * @param $articleFileName
     * @return Article
     */
    function retrieveArticleFromFileName($articleFileName): ?Article
    {
        if (file_exists(ARTICLES_PATH . $articleFileName) === false) {
            return null;
        }

        $link = $this->fileNameToLink($articleFileName);
        $fileContents = file_get_contents(ARTICLES_PATH . $articleFileName);
        $title = $this->retrieveTitle($fileContents);

        return new Article($title, $fileContents, $articleFileName, $link);
    }

    private static function retrieveArticleFileList($articlesPath): array
    {
        $scanned_directory = scandir($articlesPath);
        //the index starts at 2, so we need to create a 0-based array //and in reverse order
        $result = array();
        for ($i = sizeof($scanned_directory) - 1; $i > 1; $i--) {
            if ($scanned_directory[$i] != "temp.md") {
                $result[] = $scanned_directory[$i];
            }
        }
        return $result;
    }

    private static function fileNameToLink($articleFilePath): string
    {
        $article = substr($articleFilePath, 0, strpos($articleFilePath, '.'));
        return BASE_URL . 'index.php/notes/' . $article;
    }

    private static function retrieveTitle($fileContent): string
    {
        return substr($fileContent, 0, strpos($fileContent, "\n"));
    }
}
