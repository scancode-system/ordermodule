<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_taxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('item_id')->unique();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');

            $table->string('name');
            $table->decimal('porcentage', 10, 2);
            $table->string('module');

            $table->unique(['item_id', 'name']);
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
        Schema::dropIfExists('item_taxes');
    }
}
