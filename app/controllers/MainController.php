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
        $lang = App::$app->getProperty('language');
        $slides = R::findAll('slider');
        $products = $this->model->getHits($lang, 6);
        $this->set(compact('slides', 'products'));
        $this->setMeta(
            ___('main_index_meta_title'),
            ___('main_index_meta_description'),
            ___('main_index_meta_keywords')
        );





    }
}