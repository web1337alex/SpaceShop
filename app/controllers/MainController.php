<?php

namespace App\controllers;
use App\models\Main;
use CORE\App;
use RedBeanPHP\R;

/** @property Main $model */
class MainController extends AppController
{
    public function indexAction()
    {
        $slides = R::findAll('slider');
        $lang = App::$app->getProperty('language');
        $products = $this->model->getHits($lang, 6);
        $this->set(compact('slides', 'products'));
        $this->setMeta("Главная страница", "Описание в пару слов", "ключевые слова, ключевики");


    }
}