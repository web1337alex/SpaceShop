<?php

namespace App\controllers;

use CORE\App;

/** @property Cart Model */
class CartController extends AppController
{
    public function addAction()
    {
        $lang = App::$app->getProperty("language");
        $id = get("id");
        $quantity = get("quantity");

        if(!$id){
            return false;
        }

        $product = $this->model->getProduct($id, $lang);
        debug($product, 1);

    }
}