<?php

namespace App\backend;

use App\backend\libs\Parsedown;

class Parser
{

    private static $instance = null;

    static function getInstance(): ?Parser
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

    function markdownToHtml($markdown): string
    {
        return $this->parsedown->text($markdown);
    }
}