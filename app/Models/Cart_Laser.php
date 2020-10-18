<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart_Laser extends Model
{
    protected $fillable = [
        'user_id','customer_id','count_file'
    ];


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


    protected $table = 'cart_lasers';
    public $timestamps = true;

}