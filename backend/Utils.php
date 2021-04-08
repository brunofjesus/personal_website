<?php

class Utils
{
    $domain = "brunojesus.pt"
    public static function baseUrl(int $port = null)
    {
        $url = sprintf(
            "%s://%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            "brunojesus.pt"
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
