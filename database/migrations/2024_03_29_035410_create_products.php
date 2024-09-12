<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts extends Migration
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
            $table->string("image");
            $table->string("name");
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->decimal('quantity', 8, 2);
            $table->string('type');
            $table->string('product_type');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('accessary_id');
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
