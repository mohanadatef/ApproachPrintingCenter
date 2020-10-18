<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'user_id','action'
    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    protected $table = 'logs';
    public $timestamps = true;

}