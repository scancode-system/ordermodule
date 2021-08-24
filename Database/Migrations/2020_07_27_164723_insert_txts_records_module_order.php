<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Modules\Dashboard\Repositories\TxtRepository;

class InsertTxtsRecordsModuleOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        TxtRepository::new(['module' => 'Order', 'service' => 'TxtClient', 'alias' => 'Clientes - Padrão']);
        TxtRepository::new(['module' => 'Order', 'service' => 'TxtOrder', 'alias' => 'Pedidos - Padrão']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        TxtRepository::deleteByAlias('Clientes - Padrão');
        TxtRepository::deleteByAlias('Pedidos - Padrão');
    }
}
