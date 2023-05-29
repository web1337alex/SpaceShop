<?php

namespace App\controllers;
use App\models\Main;
use RedBeanPHP\R;

/** @property Main $model */
class MainController extends AppController
{
    public function indexAction()
    {
        $slides = R::findAll('slider');
        $products = $this->model->getHits(1, 6);
        $this->set(compact('slides', 'products'));
        $this->setMeta("Главная страница", "Описание в пару слов", "ключевые слова, ключевики");


    }
}