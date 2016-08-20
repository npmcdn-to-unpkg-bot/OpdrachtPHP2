<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //define table
    protected $table = 'products_images';
    //no timestamps
    public $timestamps = false;


    //get image string voor view
    public function getImageUrl()
    {
        return asset('uploads/products/' . $this->image);
    }

    public static function GetAllProductImages($product_id)
    {
        return self::where('products_images.product_id', $product_id)
            ->select('products_images.*')
            ->get();
    }

}
