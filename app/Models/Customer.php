<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name','email','phone','place','wallet','status'
    ];
    public function cart_file()
    {
        return $this->hasMany('App\Models\Cart_File');
    }
    public function cart_type()
    {
        return $this->hasMany('App\Models\Cart_Type');
    }
    public function cart_print()
    {
        return $this->hasMany('App\Models\Cart_Print');
    }
    public function cart_laser()
    {
        return $this->hasMany('App\Models\Cart_Laser');
    }
    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }
    public function order_type()
    {
        return $this->hasMany('App\Models\Order_Type');
    }
    public function order_print()
    {
        return $this->hasMany('App\Models\Order_Print');
    }
    public function order_laser()
    {
        return $this->hasMany('App\Models\Order_Laser');
    }
    public function wallet_transaction()
    {
        return $this->hasMany('App\Models\Wallet_Transaction');
    }
    protected $table = 'customers';
    public $timestamps = true;

}