<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Table name (if it differs from 'orders')
    protected $table = 'orders';

    // Primary key (change if it's not 'id')
    protected $primaryKey = 'id';

    // Mass assignable fields
    protected $fillable = [
        'meal',         // Change this if it should be 'meal_id'
        'price',
        'qty',
        'name',
        'phone',
        'address',
        'location',
        'paymenttype',
        'TransactionId',
    ];

    // Timestamps are enabled by default, so this can be omitted
    // Remove this if 'created_at' and 'updated_at' are used
    public $timestamps = true;

    // Relationships (Remove if 'meal' is a string, not a foreign key)
    public function meal()
    {
        return $this->belongsTo(Food::class, 'meal_id'); // Example relationship
    }
}
