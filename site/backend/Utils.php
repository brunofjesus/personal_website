<?php

namespace App\backend;

class Utils
{
    public static function baseUrl(string $protocol = PROTOCOL, string $domain = DOMAIN, $port = PORT): string
    {

        $url = sprintf("%s://%s", $protocol, $domain);

        if ($port != null) {
            $url = rtrim($url, "/");
            $url .= ":" . $port;
        }
        return $url . "/";
    }

    public static function currentDateAsInteger(): int
    {
        return intval(date("Ymd"));
    }
}
