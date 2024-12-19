<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_name',
        'payment_method',
        'amount',
        'status',
       
    ];
}
