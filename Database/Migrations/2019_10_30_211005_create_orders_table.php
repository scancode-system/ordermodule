<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');

            $table->unsignedBigInteger('status_id')->default('1');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('restrict')->onUpdate('cascade');

            $table->bigInteger('client_id')->nullable();
            $table->bigInteger('saller_id')->nullable();
            $table->bigInteger('payment_id')->nullable();
            $table->bigInteger('shipping_company_id')->nullable();

            $table->boolean('full_delivery')->default(true);
            $table->dateTime('closing_date')->nullable();
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
