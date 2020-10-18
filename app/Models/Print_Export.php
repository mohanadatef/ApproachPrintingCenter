<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Print_Export extends Model
{
    protected $fillable = [
   'machine','order','status','customer_name','customer_phone','size','color','type','quantity','user_start','user_end','user_discount','user_skip','user_create'
        ,'total_cost','kind_pay','discount','rest','paid','visa_number','time_start_at','time_end_at','time_pay_at','user_pay','discarded','user_discarded_id','time_discarded_at','chasier_status'
    ];

    protected $table = 'print_exports';
    public $timestamps = true;

}