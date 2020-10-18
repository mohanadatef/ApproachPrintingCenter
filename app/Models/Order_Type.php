<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Type extends Model
{
    protected $fillable = [
        'type_id','size_id','order_id','quantity','meter','status','user_discount_id',  'discarded','user_discarded_id','time_discarded_at','chasier_status'
        ,'total_cost','kind_pay','discount','rest','paid','visa_number','time_pay_at','user_pay_id'
    ];
    public function order()
    {
        return $this->belongsTo('App\Models\Order','order_id');
    }
    public function type()
    {
        return $this->belongsTo('App\Models\Type','type_id');
    }
    public function size()
    {
        return $this->belongsTo('App\Models\Size','size_id');
    }
    public function user_pay()
    {
        return $this->belongsTo('App\User','user_pay_id');
    }
    public function user_discount()
    {
        return $this->belongsTo('App\User','user_discount_id');
    }
    public function user_discarded()
    {
        return $this->belongsTo('App\User','user_discarded_id');
    }
    protected $table = 'order_types';
    public $timestamps = true;

}