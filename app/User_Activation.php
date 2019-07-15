<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Activation extends Model
{
    //
    protected $fillable = [
        'user_id', 'token'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
