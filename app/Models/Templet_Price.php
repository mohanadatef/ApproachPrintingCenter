<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Templet_Price extends Model
{
    protected $fillable = [
        'size','type','color','quantity','price','machine'
    ];
    protected $table = 'templet_prices';
    public $timestamps = true;

}