<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart_File extends Model
{
    protected $fillable = [
    'customer_id','name','user_id_upload','kind','cart_print_id','cart_laser_id'
    ];
    public function customer()
    {
        return $this->belongsTo('App\Models\Order','customer_id');
    }
    public function user_upload()
    {
        return $this->belongsTo('App\User','user_id_upload');
    }
    public function cart_print()
    {
        return $this->belongsTo('App\Models\Cart_Print','cart_print_id');
    }
    public function cart_laser()
    {
        return $this->belongsTo('App\Models\Cart_Laser','cart_laser_id');
    }
    protected $table = 'cart_files';
    public $timestamps = true;

}