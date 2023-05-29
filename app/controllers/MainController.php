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
        $this->set(compact('slides'));


    }
}