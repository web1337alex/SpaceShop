<?php

namespace App\controllers;

use App\models\AppModel;
use CORE\Controller;

class AppController extends Controller
{

    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
    }

}