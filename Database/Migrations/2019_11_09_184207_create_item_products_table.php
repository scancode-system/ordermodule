<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('item_id')->unique();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');            
            
            $table->unsignedBigInteger('product_id');
            $table->string('sku');
            $table->string('description');
            $table->decimal('price', 10, 2);
            $table->string('category');

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
        Schema::dropIfExists('item_products');
    }
}
