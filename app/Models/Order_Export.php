<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Export extends Model
{
    protected $fillable = [
    'user_create','customer_name','customer_phone','status','total_cost','discount','rest','paid','order','discarded'
    ];

    protected $table = 'order_exports';
    public $timestamps = true;

}