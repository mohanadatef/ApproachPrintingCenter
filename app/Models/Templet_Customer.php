<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Templet_Customer extends Model
{
    protected $fillable = [
        'name','email','phone','place'
    ];
    protected $table = 'templet_customers';
    public $timestamps = true;

}