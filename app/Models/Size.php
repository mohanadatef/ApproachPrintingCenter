<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [
        'name','order'
    ];
    public function store()
    {
        return $this->hasMany('App\Models\Store');
    }
    public function print_price()
    {
        return $this->hasMany('App\Models\Print_Price');
    }
    public function cart_type()
    {
        return $this->hasMany('App\Models\Cart_Type');
    }
    public function cart_print()
    {
        return $this->hasMany('App\Models\Cart_Print');
    }
    public function order_print()
    {
        return $this->hasMany('App\Models\Order_Print');
    }
    public function order_type()
    {
        return $this->hasMany('App\Models\Order_Type');
    }
    protected $table = 'sizes';
    public $timestamps = true;

}