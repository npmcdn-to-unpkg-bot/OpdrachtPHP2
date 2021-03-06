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

    public static function getAllSorted()
    {
        return self::select('products.*')
            ->with('images','category')
            ->orderBy('created_at','DESC')
            ->paginate(8);
    }
    public static function getAllSortedCat($cat)
    {
        return self::select('products.*')
            ->with('images','category')
            ->where('category_id',$cat)
            ->orderBy('created_at','DESC')
            ->paginate(8);
    }

    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }

    public function category()
    {
        return $this->hasOne('App\Category','id','category_id');
    }


    public static function Search($keyword)
    {
        return self::select('products.*')
            ->with('images','category')
            ->where("name", "LIKE","%".$keyword."%")
               ->orWhere("title", "LIKE", "%".$keyword."%")
               ->orWhere("description", "LIKE", "%".$keyword."%")
                ->paginate(8);
    }

}
