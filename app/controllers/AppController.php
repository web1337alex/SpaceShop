<?php

namespace App\controllers;

use App\models\AppModel;
use App\widjets\Language\Language;
use CORE\App;
use CORE\Controller;

class AppController extends Controller
{

    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();

        App::$app->setProperty('languages', Language::getLanguageList());
        App::$app->setProperty('language', Language::getActiveLanguage(App::$app->getProperty('languages')));

        debug(App::$app->getProperty('language'));
        debug(App::$app->getProperty('languages'));
    }

}