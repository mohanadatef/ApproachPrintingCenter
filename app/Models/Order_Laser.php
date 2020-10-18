<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_Laser extends Model
{
    protected $fillable = [
    'machine_id','time_start','time_end','total_time_system','total_time_user','user_discount_id','user_skip_id',
        'chasier_status', 'notes','total_cost_system','total_cost_user','user_start_id','user_end_id','order_id',
        'status','discarded','user_discarded_id','total_cost','kind_pay','discount','rest','paid','visa_number',
        'time_start_at','time_end_at','time_pay_at','user_pay_id','time_discarded_at'
    ];
    public function user_end()
    {
        return $this->belongsTo('App\User','user_end_id');
    }

    public function user_start()
    {
        return $this->belongsTo('App\User','user_start_id');
    }

    public function user_pay()
    {
        return $this->belongsTo('App\User','user_pay_id');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order','order_id');
    }

    public function machine()
    {
        return $this->belongsTo('App\Models\Machine','machine_id');
    }
    public function user_discount()
    {
        return $this->belongsTo('App\User','user_discount_id');
    }
    public function user_skip()
    {
        return $this->belongsTo('App\User','user_skip_id');
    }
    public function user_discarded()
    {
        return $this->belongsTo('App\User','user_discarded_id');
    }
    public function order_file()
    {
        return $this->HasMany('App\Models\Order_File');
    }
    protected $table = 'order_lasers';
    public $timestamps = true;

}