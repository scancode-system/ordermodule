<?php

namespace Modules\Order\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Order\Entities\Order;
use Modules\Order\Observers\OrderObserver;


class ObserverServiceProvider extends ServiceProvider {

	public function boot() {
		Order::observe(OrderObserver::class);
	}

	public function register() {
        //
	}

}
