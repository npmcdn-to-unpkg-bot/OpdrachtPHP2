<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //define table
    protected $table = 'categories';
    //no tiemstamps
    public $timestamps= false;


}
