<?php

namespace App\controllers;

use CORE\App;

/** @property Cart $model */
class CartController extends AppController
{
    public function addAction(): bool
    {
        $lang = App::$app->getProperty("language");
        $id = get("id");
        $quantity = get("quantity");

        if(!$id){
            return false;
        }

        $product = $this->model->getProduct($id, $lang);

        if(!$product || empty($product)){
            return false;
        }

        $this->model->addToCart($product, $quantity);
        if($this->isAjax()){
            debug($_SESSION['cart'], 1);
        }
        redirect();
        return true;
    }
}