<?php

namespace Modules\Order\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Modules\Order\Http\ViewComposers\EditComposer;
use Modules\Order\Http\ViewComposers\IndexComposer;
use Modules\Order\Http\ViewComposers\Items\ItemsComposer;
use Modules\Order\Http\ViewComposers\Items\InfoComposer;
use Modules\Order\Http\ViewComposers\Tabs\PaymentComposer;
use Modules\Order\Http\ViewComposers\Tabs\SallerComposer;
use Modules\Order\Http\ViewComposers\Tabs\ClientComposer;
use Modules\Order\Http\ViewComposers\Settings\SettingComposer;
use Modules\Order\Http\ViewComposers\Widgets\MiniChartSaleComposer;
use Modules\Order\Http\ViewComposers\Widgets\MiniChartOrderComposer;
use Modules\Order\Http\ViewComposers\Widgets\MiniChartAverageTicketComposer;
use Modules\Order\Http\ViewComposers\Widgets\MiniChartSallerComposer;
use Modules\Order\Http\ViewComposers\Widgets\MainChartSaleComposer;
use Modules\Order\Http\ViewComposers\Widgets\MiniInfoSaleComposer;
use Modules\Order\Http\ViewComposers\Widgets\MiniInfoAverageTicketComposer;
use Modules\Order\Http\ViewComposers\Widgets\MiniInfoOrderComposer;
use Modules\Order\Http\ViewComposers\Widgets\MiniInfoProductComposer;
use Modules\Order\Http\ViewComposers\Widgets\TableProductsBestSoldComposer;
use Modules\Order\Http\ViewComposers\Widgets\DonutChartProductCategoryComposer;


class ViewComposerServiceProvider extends ServiceProvider {

	public function boot() {
		// order
		View::composer('order::index', IndexComposer::class);
		View::composer('order::edit', EditComposer::class);

		// tabs
		View::composer('order::tabs.payment', PaymentComposer::class);
		View::composer('order::tabs.saller', SallerComposer::class);
		View::composer('order::tabs.client', ClientComposer::class);

		// item
		View::composer('order::items.items', ItemsComposer::class);
		View::composer('order::items.info', InfoComposer::class);

		// setting
		View::composer('order::loader.settings.body', SettingComposer::class);

		// widgets
		View::composer('dashboard::loader.dashboard.dashboard', 'Modules\Order\Http\ViewComposers\Widgets\WidgetComposer');

		View::composer('order::widgets.mini_chart_sale', MiniChartSaleComposer::class);
		View::composer('order::widgets.mini_chart_order', MiniChartOrderComposer::class);
		View::composer('order::widgets.mini_chart_average_ticket', MiniChartAverageTicketComposer::class);
		View::composer('order::widgets.mini_chart_saller', MiniChartSallerComposer::class);
		View::composer('order::widgets.main_chart_sale', MainChartSaleComposer::class);
		View::composer('order::widgets.mini_info_sale', MiniInfoSaleComposer::class);
		View::composer('order::widgets.mini_info_order', MiniInfoOrderComposer::class);
		View::composer('order::widgets.mini_info_average_ticket', MiniInfoAverageTicketComposer::class);
		View::composer('order::widgets.mini_info_product', MiniInfoProductComposer::class);
		View::composer('order::widgets.table_products_best_sold', TableProductsBestSoldComposer::class);
		View::composer('order::widgets.donut_chart_product_category', DonutChartProductCategoryComposer::class);
	}

	public function register() {
        //
	}

}
