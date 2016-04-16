<?php

namespace App;

use \Cache;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    public static function product_cached($product_id) {
        /* Cache the product won't change in this demo */
        if ($product_id) {
            $product = Cache::rememberForever('product_' . $product_id, function() use($product_id) {
                        return self::find($product_id);
                    });
            return $product;
        }
        return FALSE;
    }

    public static function product_list_cached($order_by, $order_direction) {
        /* Cache the product list as it won't change in this demo */
        $products = Cache::rememberForever('products_' . $order_by . '_' . $order_direction, function() use($order_by, $order_direction) {
                    return self::orderBy($order_by, $order_direction)->get();
                });
        return $products;
    }

}
