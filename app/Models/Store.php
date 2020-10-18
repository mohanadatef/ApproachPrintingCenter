<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'size_id','type_id','roll_size','quantity','meter','width','quantity_min','price'
    ];
    public function size()
    {
        return $this->belongsTo('App\Models\Size','size_id');
    }
    public function type()
    {
        return $this->belongsTo('App\Models\Type','type_id');
    }
    public function store_transaction()
    {
        return $this->hasMany('App\Models\Store_Transaction');
    }
    protected $table = 'stores';
    public $timestamps = true;

}