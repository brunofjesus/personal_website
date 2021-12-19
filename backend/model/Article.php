<?php

namespace App\backend\model;

use App\backend\Parser;

class Article
{
    /**
     * The article title
     * @var string
     */
    private $title;

    /**
     * The article markdown content
     * @var string
     */
    private $markdownContent;

    /**
     * @var string
     */
    private $fileName;

    /**
     * @var string
     */
    private $link;

    /**
     * @var Parser
     */
    private $parser;


    /**
     * Article constructor.
     * @param string $title
     * @param string $markdownContent
     * @param string $fileName
     * @param string $link
     */
    public function __construct(string $title, string $markdownContent, string $fileName, string $link)
    {
        $this->title = $title;
        $this->markdownContent = $markdownContent;
        $this->fileName = $fileName;
        $this->link = $link;

        $this->parser = Parser::getInstance();
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getMarkdownContent(): string
    {
        return $this->markdownContent;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }


    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    public function toHTML()
    {
        if ($this->markdownContent == false) { //file not found
            return false;
        }

        $textToConvert = substr($this->markdownContent, strpos($this->markdownContent, "\n") + 1);

        return $this->parser->markdownToHtml($textToConvert);
    }
}