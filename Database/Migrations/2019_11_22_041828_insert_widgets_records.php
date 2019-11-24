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
            ['name' => 'Mini Gráfico - Vendas Diária', 'columns' => 3, 'view' => 'order::widgets.mini_chart_sale'],
            ['name' => 'Mini Gráfico - Pedido', 'columns' => 3, 'view' => 'order::widgets.mini_chart_order'],
            ['name' => 'Mini Gráfico - Ticket Médio', 'columns' => 3, 'view' => 'order::widgets.mini_chart_average_ticket'],
            ['name' => 'Mini Gráfico - Representantes', 'columns' => 3, 'view' => 'order::widgets.mini_chart_saller'],
            
            ['name' => 'Gráfico Principal Vendas', 'columns' => 12, 'view' => 'order::widgets.main_chart_sale'],
            
            ['name' => 'Mini Info - Vendas', 'columns' => 3, 'view' => 'order::widgets.mini_info_sale'],
            ['name' => 'Mini Info - Pedido', 'columns' => 3, 'view' => 'order::widgets.mini_info_order'],
            ['name' => 'Mini Info - Ticket Médio', 'columns' => 3, 'view' => 'order::widgets.mini_info_average_ticket'],
            ['name' => 'Mini Info - Produtos', 'columns' => 3, 'view' => 'order::widgets.mini_info_product'],

            ['name' => 'Tabela - Produtos mais vendidos', 'columns' => 12, 'view' => 'order::widgets.table_products_best_sold'],
            
            ['name' => 'Gráfico Donut - Produto Categorias', 'columns' => 12, 'view' => 'order::widgets.donut_chart_product_category']         
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        WidgetRepository::removeByName('Mini Gráfico - Vendas Diária');
        WidgetRepository::removeByName('Mini Gráfico - Pedido');
        WidgetRepository::removeByName('Mini Gráfico - Ticket Médio');
        WidgetRepository::removeByName('Mini Gráfico - Representantes');

        WidgetRepository::removeByName('Gráfico Principal Vendas');

        WidgetRepository::removeByName('Mini Info - Vendas');
        WidgetRepository::removeByName('Mini Info - Pedido');
        WidgetRepository::removeByName('Mini Info - Ticket Médio');
        WidgetRepository::removeByName('Mini Info - Produtos');

        WidgetRepository::removeByName('Tabela - Produtos mais vendidos');

        WidgetRepository::removeByName('Gráfico Donut - Produto Categorias');
    }
}
