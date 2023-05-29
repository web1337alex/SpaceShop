<?php


define("DEBUG_MODE", true);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/CORE');
define("HELPERS", CORE . '/helpers');
define("CACHE", ROOT . '/tmp/cache');
define("LOGS", ROOT . '/tmp/logs');
define("CONFIG", ROOT . '/config');

define("LAYOUT", 'default');
define("PATH", 'http://spaceshop.loc/');
define("PUBLIC_PATH", PATH . "public");
define("ASSETS", PUBLIC_PATH . "/assets");
define("ADMIN", 'http://spaceshop.loc/admin');
define("NO_IMAGE", 'uploads/no_image.jpg');
define("WIDJETS", PATH . 'app/widjets');

require_once ROOT . '/vendor/autoload.php';
