<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //define table
    protected $table = 'products_categories';
    //no tiemstamps
    public $timestamps= false;


    public static function findProductCatId($product_id)
    {
        return self::where('products_categories.product_id', $product_id)
            ->select('products_categories.category_id')
            ->first();
    }

    public static function findCatRelation($product_id)
    {
        return self::where('products_categories.product_id', $product_id)
            ->select('products_categories.*')
            ->first();
    }
}
