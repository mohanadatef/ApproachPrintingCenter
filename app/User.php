<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;
    protected $fillable = [
        'name','email','password','statues','code_discount'
    ];
    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user')->withTimestamps('created_at','updated_at');
    }
    public function role_iformation()
    {
        return $this->belongsToMany('App\Role_user');
    }
    public function cart_file()
    {
        return $this->hasMany('App\Models\Cart_File');
    }
    public function cart_type()
    {
        return $this->hasMany('App\Models\Cart_Type');
    }
    public function cart_print()
    {
        return $this->hasMany('App\Models\Cart_Print');
    }
    public function cart_laser()
    {
        return $this->hasMany('App\Models\Cart_Laser');
    }
    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }
    public function order_type()
    {
        return $this->hasMany('App\Models\Order_Type');
    }
    public function order_print()
    {
        return $this->hasMany('App\Models\Order_Print');
    }
    public function order_laser()
    {
        return $this->hasMany('App\Models\Order_Laser');
    }
    public function wallet_transaction()
    {
        return $this->hasMany('App\Models\Wallet_Transaction');
    }
    public function log()
    {
        return $this->hasMany('App\Models\Log');
    }
    public function chasier_transaction()
    {
        return $this->hasMany('App\Models\Chasier_Transaction');
    }
    public function user_transaction()
    {
        return $this->hasMany('App\Models\User_Transaction');
    }
    protected $table = 'users';
    public $timestamps = true;

}