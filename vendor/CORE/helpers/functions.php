<?php

use CORE\App;

function debug($data, $die = false)
{
    echo "<pre>" . print_r($data, 1) . "</pre>";
    if ($die) {
        die;
    }
}

function h($str)
{
    return htmlspecialchars($str);
}

function redirect($http = false){
    if($http){
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    die();
}

function baseUrl()
{
    return PATH . (App::$app->getProperty('lang') ? App::$app->getProperty('lang') . '/' : '');
}

function get($key, $type = 'i')
{
    $param = $key;
    $$param = $_GET[$param] ?? '';
    if($type == 'i'){
        return (int)$$param;
    } elseif ($type == 'f'){
        return (float)$$param;
    } else {
        return trim($$param);
    }
}

function post($key, $type = 's')
{
    $param = $key;
    $$param = $_POST[$param] ?? '';
    if($type == 'i'){
        return (int)$$param;
    } elseif ($type == 'f'){
        return (float)$$param;
    } else {
        return trim($$param);
    }
}