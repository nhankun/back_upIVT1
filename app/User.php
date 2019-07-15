<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    CONST USER_ADMIN = 0;
    CONST USER_CUSTOMER = 1;
    CONST USER_SHIPPER = 2;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tel', 'address', 'active', 'user_type'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function user_Activations()
    {
        return $this->hasMany('App\User_Activation');
    }

    public static function countUsers()
    {
        $count = count(User::get('id'));
        return $count;
    }
}
