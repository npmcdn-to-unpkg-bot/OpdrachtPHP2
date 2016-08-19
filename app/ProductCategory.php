<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //define table
    protected $table = 'products_categories';
    //no tiemstamps
    public $timestamps= false;
}
