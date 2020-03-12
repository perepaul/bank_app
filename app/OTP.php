<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    protected $fillable = ['token','expires_at'];
    protected $dates = ['expires_at'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
