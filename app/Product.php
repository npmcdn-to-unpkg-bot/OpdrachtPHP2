<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //define table
    protected $table = 'products';
    //add timestamps
    public $timestamps = true;

    public static function findById($id)
    {
        return self::where('products.id', $id)
            ->select('products.*')
            ->first();
    }
    public static function ProductsFromUser($user_id)
    {
        return self::where('products.user_id', $user_id)
            ->select('products.*')
            ->get();
    }

}
