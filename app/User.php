<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable
{
    use Messagable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','zipcode','city'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function getUserById($user_id)
    {
        return self::where('users.id', $user_id)
            ->select('users.*')
            ->first();
    }

    public static function getUserName($user_id)
    {
        return self::where('users.id', $user_id)
            ->select('users.name')
            ->first();
    }

}
