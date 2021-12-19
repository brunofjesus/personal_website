<?php
/**
 * Website configuration
 *
 * @author Bruno Jesus (aka strang3quark) <bruno.fl.jesus@gmail.com>
 * @version 0.1
 * @copyright (C) 2016 Bruno Jesus (aka strang3quark) <bruno.fl.jesus@gmail.com>
 * @license MIT
 */

use App\backend\Utils;

define("DOMAIN", getenv("DOMAIN") != false ? getenv("DOMAIN") : 'localhost');
define("PROTOCOL", getenv("PROTOCOL") != false ? getenv("PROTOCOL") : 'http');
define("PORT", getenv("PORT") != false ? getenv("PORT") : null);
define("BASE_URL", Utils::baseUrl(PROTOCOL, DOMAIN, PORT));
const DEFAULT_PAGE = 'about';
const SITE_TITLE = 'Bruno Jesus'; //the <title> tag content
const HEADER_TITLE = 'Bruno Jesus'; //the header page title
define("ARTICLES_PATH", realpath('./articles/') . '/');
