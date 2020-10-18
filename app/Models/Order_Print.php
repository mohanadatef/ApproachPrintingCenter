<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Print extends Model
{
    protected $fillable = [
    'machine_id','order_id','status','size_id','color_id','type_id','quantity','user_start_id','user_end_id','user_discount_id','user_skip_id'
        ,'total_cost','kind_pay','discount','rest','paid','visa_number','time_start_at','time_end_at','time_pay_at','user_pay_id'
           ,'discarded','user_discarded_id','time_discarded_at','chasier_status'
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order','order_id');
    }
    public function size()
    {
        return $this->belongsTo('App\Models\Size','size_id');
    }
    public function type()
    {
        return $this->belongsTo('App\Models\Type','type_id');
    }
    public function machine()
    {
        return $this->belongsTo('App\Models\Machine','machine_id');
    }
    public function color()
    {
        return $this->belongsTo('App\Models\Color','color_id');
    }
    public function user_start()
    {
        return $this->belongsTo('App\User','user_start_id');
    }
    public function user_end()
    {
        return $this->belongsTo('App\User','user_end_id');
    }
    public function user_pay()
    {
        return $this->belongsTo('App\User','user_pay_id');
    }
    public function user_discount()
    {
        return $this->belongsTo('App\User','user_discount_id');
    }
    public function user_skip()
    {
        return $this->belongsTo('App\User','user_skip_id');
    }
    public function order_file()
    {
        return $this->HasMany('App\Models\Order_File');
    }
    public function user_discarded()
    {
        return $this->belongsTo('App\User','user_discarded_id');
    }
    protected $table = 'order_prints';
    public $timestamps = true;

}