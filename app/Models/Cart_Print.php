<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart_Print extends Model
{
    protected $fillable = [
        'machine_id','size_id','color_id','type_id','quantity','user_id','customer_id'
    ];
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
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer','customer_id');
    }
    public function cart_file()
    {
        return $this->HasMany('App\Models\Cart_File');
    }

    protected $table = 'cart_prints';
    public $timestamps = true;

}