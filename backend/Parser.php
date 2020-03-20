<?php

class Parser
{

    private static $instance = null;

    static function getInstance()
    {
        if (isset(self::$instance) == false) {
            self::$instance = new Parser();
        }

        return self::$instance;
    }

    /**
     * @var Parsedown
     */
    private $parsedown;

    /**
     * Parser constructor.
     */
    private function __construct()
    {
        $this->parsedown = new Parsedown();
    }

    function markdownToHtml($markdown)
    {
        return $this->parsedown->text($markdown);
    }
}