<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
        'name','order'
    ];
    public function print_price()
    {
        return $this->hasMany('App\Models\Print_Price');
    }
    public function cart_print()
    {
        return $this->hasMany('App\Models\Cart_Print');
    }


    public function order_print()
    {
        return $this->hasMany('App\Models\Order_Print');
    }
    protected $table = 'colors';
    public $timestamps = true;

}