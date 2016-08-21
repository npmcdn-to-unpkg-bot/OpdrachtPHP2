<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //define table
    protected $table = 'categories';
    //no tiemstamps
    public $timestamps= false;


    public static function findCatName($category_id)
    {
        return self::where('categories.id', $category_id)
            ->select('categories.name')
            ->first();
    }

}
