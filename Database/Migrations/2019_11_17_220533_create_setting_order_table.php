<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_order', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('order_start')->default(1);
            $table->text('statement_responsibility');
            $table->text('global_observation');
            $table->integer('number_copies')->default(2);            

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
        Schema::dropIfExists('setting_order');
    }
}
