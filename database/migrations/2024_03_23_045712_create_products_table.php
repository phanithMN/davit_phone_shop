<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->decimal('quantity');
            $table->decimal('price', 8, 2);
            $table->decimal('discount_price', 8, 2)->nullable();
            $table->string('type');
            $table->bigInteger('category_id');
            $table->bigInteger('brand_id');
            $table->bigInteger('product_type');
            $table->bigInteger('accessary_id');
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
        Schema::dropIfExists('products');
    }
}
