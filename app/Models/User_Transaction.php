<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Transaction extends Model
{
    protected $fillable = [
        'kind','chasier_status','total','user_done_id','user_id_take','notes'
    ];
    public function user_done()
    {
        return $this->belongsTo('App\User','user_done_id');
    }
    public function user_ake()
    {
        return $this->belongsTo('App\User','user__id_take');
    }
    protected $table = 'user_transactions';
    public $timestamps = true;

}