<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable=[
'meal',
'price',
'qty',
'name',
'phone',
'address',
'location',
'paymenttype',
'TransactionId',

    ];
}
