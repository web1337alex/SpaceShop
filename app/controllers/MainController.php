<?php

namespace App\controllers;
use App\models\Main;
use CORE\App;
use CORE\Cache;
use RedBeanPHP\R;

/** @property Main $model */
class MainController extends AppController
{
    public function indexAction()
    {

//        $test = 'Hello world';
//        $cache = Cache::getInstance();
//        $cache->set('test', $test, 30);


        $slides = R::findAll('slider');
        $lang = App::$app->getProperty('language');
        $products = $this->model->getHits($lang, 6);
        $this->set(compact('slides', 'products'));
        $this->setMeta(
            ___('main_index_meta_title'),
            ___('main_index_meta_description'),
            ___('main_index_meta_keywords')
        );





    }
}