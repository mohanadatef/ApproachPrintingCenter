<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store_Transaction extends Model
{
    protected $fillable = [
        'kind','quantity_after','quantity_before','store_id','price'
    ];
    public function store()
    {
        return $this->belongsTo('App\Models\Store','store_id');
    }
    protected $table = 'store_transactions';
    public $timestamps = true;

}