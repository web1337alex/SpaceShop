<?php

namespace CORE;

use RedBeanPHP\R;

class Database
{
    use TSingleton;

    private function __construct()
    {
        $db = require_once CONFIG . '/db_config.php';
        R::setup($db['dsn'], $db['user'], $db['password']);
        if(!R::testConnection()){
            throw new \Exception("Ошибка соединения с базой данных", 500);
        }

        R::freeze();

        if(DEBUG_MODE){
            R::debug(true, 3);
        }
    }
}