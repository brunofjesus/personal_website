<?php
/**
 * Website configuration
 *
 * @author Bruno Jesus (aka strang3quark) <bruno.fl.jesus@gmail.com>
 * @version 0.1
 * @copyright (C) 2016 Bruno Jesus (aka strang3quark) <bruno.fl.jesus@gmail.com>
 * @license MIT
 */

define('DOMAIN', 'brunojesus.pt');
define('PROTOCOL', 'https');
define('PORT', null);
define('BASE_URL',Utils::baseUrl(PROTOCOL, DOMAIN, PORT));
define('DEFAULT_PAGE','about');
define('SITE_TITLE','Bruno Jesus'); //the <title> tag content
define('HEADER_TITLE','Bruno Jesus'); //the header page title
define('ARTICLES_PATH', realpath('./articles/') . '/');
