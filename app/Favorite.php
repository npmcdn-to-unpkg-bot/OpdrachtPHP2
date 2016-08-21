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

    public static function FavoriteProductIds($user_id)
    {
        return self::select('favorites.*')
            ->where('from_user_id',$user_id)
            ->get();
    }

}
