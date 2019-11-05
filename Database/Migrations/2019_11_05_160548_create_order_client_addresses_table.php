<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderClientAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_client_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('order_client_id')->unique();
            $table->foreign('order_client_id')->references('id')->on('order_clients')->onDelete('cascade')->onUpdate('cascade');

            $table->string('street')->nullable();
            $table->integer('number')->nullable();
            $table->string('apartment')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('city')->nullable();
            $table->string('st', 2)->nullable();
            $table->string('postcode', 8)->nullable();


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
        Schema::dropIfExists('order_client_addresses');
    }
}
