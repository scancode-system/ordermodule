<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Dashboard\Repositories\WidgetRepository;

class InsertWidgetsRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        WidgetRepository::storeMany([
            ['name' => 'Mini Gráfico - Venda Diária', 'visible' => false, 'columns' => 3, 'view' => 'eita'],
            ['name' => 'Mini Gráfico - Venda Pedido', 'visible' => false, 'columns' => 3, 'view' => 'eita'],
            ['name' => 'Mini Gráfico - Ticket Médio', 'visible' => false, 'columns' => 3, 'view' => 'eita'],
            ['name' => 'Mini Gráfico - Representantes', 'visible' => false, 'columns' => 3, 'view' => 'eita'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        WidgetRepository::removeByName('Mini Gráfico - Venda Diária');
        WidgetRepository::removeByName('Mini Gráfico - Venda Pedido');
        WidgetRepository::removeByName('Mini Gráfico - Ticket Médio');
        WidgetRepository::removeByName('Mini Gráfico - Representantes');
    }
}
