<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet_Transaction extends Model
{
    protected $fillable = [
        'total','wallet_after','wallet_before','customer_id','user_id'
    ];
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer','customer_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    protected $table = 'wallet_transactions';
    public $timestamps = true;

}