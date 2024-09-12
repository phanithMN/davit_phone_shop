<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('contact');
            $table->string('country');
            $table->string('fname');
            $table->string('lname');
            $table->string('address');
            $table->string('apartment');
            $table->string('city');
            $table->string('postal_code');
            $table->decimal('shipping');
            $table->string('payment');
            $table->tinyInteger('status')->default('0');
            $table->string('tracking_no');
            $table->timestamps();
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
