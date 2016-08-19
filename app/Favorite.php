<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //define table
    protected $table = 'favorites';
    //no tiemstamps
    public $timestamps= false;
}
