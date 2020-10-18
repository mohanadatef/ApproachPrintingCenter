<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chasier_Transaction extends Model
{
    protected $fillable = [
        'total_chasier_before','total_chasier_after','total_bank','user_end_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_end_id');
    }
    protected $table = 'chasier_transactions';
    public $timestamps = true;

}