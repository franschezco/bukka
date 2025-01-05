<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();                                  // Primary Key
            $table->string('name');                        // Customer Name
            $table->string('phone');                       // Phone Number
            $table->string('address');                     // Address
            $table->string('location');                    // Location
            $table->string('paymenttype');                 // Payment Type (COD/Card)
            $table->string('TransactionId')->nullable();   // Transaction ID (optional for COD)
            $table->string('meal');                        // Meal Name or Description
            $table->integer('qty');                        // Quantity Ordered
            $table->decimal('price', 10, 2)->nullable();   // Item Price (nullable for simplicity)
            $table->decimal('amount', 10, 2);              // Total Amount
            $table->string('status')->default('recieved'); // Default Status
            $table->timestamps();                          // Timestamps: created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

