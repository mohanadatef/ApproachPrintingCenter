<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_File extends Model
{
    protected $fillable = [
    'order_id','filename','user_id_upload','user_id_download','kind','order_print_id','order_laser_id'
    ];
    public function order()
    {
        return $this->belongsTo('App\Models\Order','order_id');
    }
    public function user_upload()
    {
        return $this->belongsTo('App\User','user_id_upload');
    }
    public function user_download()
    {
        return $this->belongsTo('App\User','user_id_download');
    }
    public function order_print()
    {
        return $this->belongsTo('App\Models\Order_Print','order_print_id');
    }
    public function order_laser()
    {
        return $this->belongsTo('App\Models\Order_Laser','order_laser_id');
    }
    protected $table = 'order_files';
    public $timestamps = true;

}