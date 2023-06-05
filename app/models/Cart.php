<?php

namespace App\models;

use RedBeanPHP\R;

class Cart extends AppModel
{

    public function getProduct($id, $lang): array
    {
        return R::getRow("
            SELECT p.*, pd.* FROM product p
            JOIN product_description pd on p.id = pd.product_id
            WHERE p.status = 1
            AND p.id = ?
            AND pd.language_id = ?",
            [$id, $lang['id']]
        );
    }

    public function addToCart($product, $quantity = 1)
    {
        $quantity = abs($quantity);

        if($product['is_download'] && isset($_SESSION['cart'][$product['id']])){
            return false;
        }

        if(isset($_SESSION['cart'][$product['id']])){
            $_SESSION['cart'][$product['id']]['quantity'] += $quantity;
        } else {
            if($product['is_download']){
                $quantity = 1;
            }
            $_SESSION['cart'][$product['id']] = [
                'title' => $product['title'],
                'slug' => $product['slug'],
                'price' => $product['price'],
                'quantity' => $quantity,
                'img' => $product['img'],
                'is_download' => $product['is_download'],
            ];
        }

        $_SESSION['cartQuantity'] = !empty($_SESSION['cartQuantity']) ? $_SESSION['cartQuantity'] + $quantity : $quantity;
        $_SESSION['cartSumm'] = !empty($_SESSION['cartSumm']) ? $_SESSION['cartSumm'] + ($quantity * $product['price']) : $quantity * $product['price'];
        return true;

    }

}