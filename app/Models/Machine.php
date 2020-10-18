<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $fillable = [
        'name','order','kind','price','work'
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
    protected $table = 'machines';
    public $timestamps = true;

}