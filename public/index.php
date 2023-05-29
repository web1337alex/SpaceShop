<?php

if (PHP_MAJOR_VERSION < 8){
    die('Необходима версия PHP от 8.0 и выше');
}

require_once dirname(__DIR__) . '/config/init.php';
require_once HELPERS . '/functions.php';
require_once CONFIG . '/routes.php';

new \CORE\App();
//
//debug(\CORE\Router::getRoutes());