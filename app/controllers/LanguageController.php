<?php

namespace App\controllers;

use CORE\App;

class LanguageController extends AppController
{
    public function changeAction()
    {
        $lang = get('lang', 's');
        if($lang){
            if(array_key_exists($lang, App::$app->getProperty('languages'))){
                $url = trim(str_replace(PATH, '', $_SERVER['HTTP_REFERER']), '/');
                $urlParts = explode("/", $url, 2);
                if(array_key_exists($urlParts[0], App::$app->getProperty('languages'))){
                    if($lang != App::$app->getProperty('language')['code']){
                        $urlParts[0] = $lang;
                    } else {
                        array_shift($urlParts);
                    }
                } else {
                    if($lang != App::$app->getProperty('language')['code']){
                        array_unshift($urlParts, $lang);
                    }
                }
                $url = PATH . implode('/', $urlParts);
                redirect($url);
            }
        }
        redirect();
    }
}