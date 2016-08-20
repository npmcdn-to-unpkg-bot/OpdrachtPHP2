<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //define table
    protected $table = 'products_images';
    //no timestamps
    public $timestamps = false;


    //get image string
    public function getImageUrl()
    {
        return asset('uploads/products/' . $this->image);
    }

}
