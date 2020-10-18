<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_Export extends Model
{
    protected $fillable = [
   'meter','customer_name','customer_phone','order','status','size','color','type','quantity','user_discount','user_create'
        ,'total_cost','kind_pay','discount','rest','paid','visa_number','time_pay_at','user_pay','discarded','user_discarded_id','time_discarded_at','chasier_status'
    ];

    protected $table = 'type_exports';
    public $timestamps = true;

}