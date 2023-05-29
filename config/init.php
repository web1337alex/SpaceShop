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
define("PATH", 'http://spacenotes-framework.loc');
define("ADMIN", 'http://spacenotes-framework.loc/admin');
define("NO_IMAGE", 'uploads/no_image.jpg');

require_once ROOT . '/vendor/autoload.php';
