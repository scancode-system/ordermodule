<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Modules\Dashboard\Repositories\ReportRepository;

class InsertReportsRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ReportRepository::newByCategory(['module' => 'Order', 'export' => 'OrdersExport', 'alias' => 'Pedidos Simples'], 'Pedidos');
        ReportRepository::newByCategory(['module' => 'Order', 'export' => 'OrdersFullExport', 'alias' => 'Pedidos Detalhado'], 'Pedidos');

        ReportRepository::newByCategory(['module' => 'Order', 'export' => 'ItemsExport', 'alias' => 'Pedidos Items Simples'], 'Items');
        ReportRepository::newByCategory(['module' => 'Order', 'export' => 'ItemsFullExport', 'alias' => 'Pedidos Items Detalhado'], 'Items');

        ReportRepository::newByCategory(['module' => 'Order', 'export' => 'ProductsExport', 'alias' => 'Produtos Simples'], 'Produtos');

        ReportRepository::newByCategory(['module' => 'Order', 'export' => 'SallersExport', 'alias' => 'Representantes'], 'Representantes');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        ReportRepository::deleteByAlias('Pedidos Simples');
        ReportRepository::deleteByAlias('Pedidos Detalhado');

        ReportRepository::deleteByAlias('Pedidos Items Simples');
        ReportRepository::deleteByAlias('Pedidos Items Detalhado');

        ReportRepository::deleteByAlias('Produtos Simples');

        ReportRepository::deleteByAlias('Representantes');
    }
}
