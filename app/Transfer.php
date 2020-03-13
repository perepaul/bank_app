<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = ['reference','reciepient_name','routing_number','account_number','account_type','swift_code','amount','iban_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAmountAttribute($value)
    {
        return $value;
    }
}
