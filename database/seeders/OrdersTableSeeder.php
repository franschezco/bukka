<?php

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        Order::create([
            'name' => 'John Doe',
            'phone' => '1234567890',
            'address' => '123 Street',
            'location' => 'City Center',
            'paymenttype' => 'COD',
            'TransactionId' => null,
            'meal' => 'Spaghetti & Chicken',
            'qty' => 2,
            'price' => 15.00,
            'amount' => 30.00,
            'status' => 'recieved',
        ]);
    }
}
