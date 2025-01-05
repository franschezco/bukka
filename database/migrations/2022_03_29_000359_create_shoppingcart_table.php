<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingcartTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Use a default table name if the config value is missing
        $tableName = config('cart.database.table', 'shoppingcart');

        Schema::create($tableName, function (Blueprint $table) {
            $table->string('identifier');
            $table->string('instance');
            $table->longText('content');
            $table->nullableTimestamps();

            $table->primary(['identifier', 'instance']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $tableName = config('cart.database.table', 'shoppingcart');
        Schema::dropIfExists($tableName);
    }
}
