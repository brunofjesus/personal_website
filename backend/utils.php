<?php

class Utils
{
    public static function baseUrl(int $port = null)
    {
        $url = sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
            $_SERVER['REQUEST_URI']
        );

        //drop index.php
        $index_pos = stripos($url, '/index.php');
        if ($index_pos) {
            $url = substr($url, 0, stripos($url, '/index.php'));
        }
        if ($port != null) {
            $url = rtrim($url, "/");
            $url .= ":" . $port;
        }
        return $url . "/";
    }

    public static function currentDateAsInteger()
    {
        return intval(date("Ymd"));
    }
}