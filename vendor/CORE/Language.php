<?php

namespace CORE;

class Language
{
    public static array $langData = [];
    public static array $langLayout = [];
    public static array $langView = [];

    public static function load($langCode, $view)
    {
        $langLayout = APP . '/languages/'.$langCode.'.php';
        $langView = APP . '/languages/'.$langCode.'/'.$view['controller'].'/'.$view['action'].'.php';

        if(file_exists($langLayout)){
            self::$langLayout = require_once $langLayout;
        }

        if(file_exists($langView)){
            self::$langView = require_once $langView;
        }

        self::$langData = array_merge(self::$langLayout, self::$langView);
    }

    public static function get($key)
    {
        return self::$langData[$key] ?? $key;
    }

}