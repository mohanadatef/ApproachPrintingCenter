<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Print_Price extends Model
{
    protected $fillable = [
        'size_id','type_id','color_id','quantity','price','machine_id','code'
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



    protected $table = 'print_prices';
    public $timestamps = true;

}