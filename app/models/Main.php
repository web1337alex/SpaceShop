<?php

namespace App\models;
use RedBeanPHP\R;

class Main extends \CORE\Model
{
    public function getNames(): array{
        return R::findAll('name');
    }
}