<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Return the user attributes.

     * @return array
     */
    public static function getAuthor($id) {
        $user = self::find($id);
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'url' => '', // Optional
            'avatar' => 'gravatar', // Default avatar
            'admin' => $user->role === 'admin', // bool
        ];
    }

}
