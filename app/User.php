<?php

namespace App;

use App\Transfer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_id','first_name','last_name', 'email', 'password','visible_password','gender','account_number','status','is_admin','balance','address','image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getImageAttribute($value)
    {
        return asset('storage/profile_images/'.$value);
    }


    public function transfers()
    {
      
        return $this->hasMany(Transfer::class);
        
    }

    public function getBalanceAttribute($value)
    {
        return '$'.$value;
    }



}
