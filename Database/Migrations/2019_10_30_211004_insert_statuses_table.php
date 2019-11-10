<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Order\Entities\Status;

class InsertStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Status::insert([
            ['id' => 1, 'description' => 'Aberto'],
            ['id' => 2, 'description' => 'Concluído'],
            ['id' => 3, 'description' => 'Cancelado'],
            ['id' => 4, 'description' => 'Reservado']
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Status::truncate();
    }
}
