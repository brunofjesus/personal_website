<?php

require_once('backend/config.php');

class Utils
{
    public static function baseUrl(string $protocol = PROTOCOL, string $domain = DOMAIN, int $port = PORT)
    {

        $url = sprintf("%s://%s", $protocol, $domain);

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
