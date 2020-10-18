<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laser_Export extends Model
{
    protected $fillable = [
    'machine','time_start','time_end','customer_name','customer_phone','total_time_system','total_time_user','user_discount','user_skip',
        'notes','total_cost_system','total_cost_user','user_start','user_end','order','status','user_create','discarded','user_discarded_id','time_discarded_at','chasier_status'
        ,'total_cost','kind_pay','discount','rest','paid','visa_number','time_start_at','time_end_at','time_pay_at','user_pay'
    ];

    protected $table = 'laser_exports';
    public $timestamps = true;

}