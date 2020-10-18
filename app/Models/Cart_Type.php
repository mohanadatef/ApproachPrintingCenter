<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart_Type extends Model
{
    protected $fillable = [
        'type_id','size_id','customer_id','user_id','quantity','meter'
    ];
    public function type()
    {
        return $this->belongsTo('App\Models\Type','type_id');
    }
    public function size()
    {
        return $this->belongsTo('App\Models\Size','size_id');
    }
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer','customer_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    protected $table = 'cart_types';
    public $timestamps = true;

}