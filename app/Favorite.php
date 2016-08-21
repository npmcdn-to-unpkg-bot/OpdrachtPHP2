<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //define table
    protected $table = 'favorites';
    //no tiemstamps
    public $timestamps= false;

    public static function findByUserId($id)
    {
        return self::where('favorites.product_id', $id)
            ->select('favorites.*')
            ->first();
    }
}
