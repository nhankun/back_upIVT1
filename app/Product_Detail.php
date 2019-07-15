<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Detail extends Model
{
    //
    protected $table = 'product_details';

    protected $fillable = [
        'product_id', 'screen', 'os', 'camera', 'font_camera', 'cpu', 'gpu', 'ram', 'memory', 'sim', 'Battery_capacity'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
