<?php

namespace app\controllers;


use app\models\Main;
use RedBeanPHP\R;
use CORE\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        /** @property Main $model */
        $names = $this->model->getNames();
        $nameID = R::getRow('SELECT * FROM name WHERE id = 2 ');
        $this->setMeta('Главная страница', 'Description', 'key, word');
        $this->set(compact('names'));
    }
}