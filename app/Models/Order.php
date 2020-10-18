<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    'user_id','customer_id','status','total_cost','discount','rest','paid','count_order_discarded',
        'discarded'
    ];
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer','customer_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function order_laser()
    {
        return $this->HasMany('App\Models\Order_laser');
    }
    public function order_print()
    {
        return $this->HasMany('App\Models\Order_Print');
    }
    public function order_file()
    {
        return $this->HasMany('App\Models\Order_File');
    }
    public function order_type()
    {
        return $this->HasMany('App\Models\Order_Type');
    }
    protected $table = 'orders';
    public $timestamps = true;

}