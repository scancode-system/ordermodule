<?php

namespace Modules\Order\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Order\Entities\Order;
use Modules\Order\Observers\OrderObserver;
use Modules\Order\Entities\OrderClient;
use Modules\Order\Observers\OrderClientObserver;
use Modules\Order\Entities\OrderSaller;
use Modules\Order\Observers\OrderSallerObserver;


class ObserverServiceProvider extends ServiceProvider {

	public function boot() {
		Order::observe(OrderObserver::class);
		OrderClient::observe(OrderClientObserver::class);
		OrderSaller::observe(OrderSallerObserver::class);
	}

	public function register() {
        //
	}

}
