<?php

namespace Modules\Order\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Modules\Order\Http\ViewComposers\EditComposer;
use Modules\Order\Http\ViewComposers\IndexComposer;
use Modules\Order\Http\ViewComposers\Items\ItemsComposer;
use Modules\Order\Http\ViewComposers\Tabs\PaymentComposer;
use Modules\Order\Http\ViewComposers\Tabs\SallerComposer;
use Modules\Order\Http\ViewComposers\Tabs\ClientComposer;


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
	}

	public function register() {
        //
	}

}
