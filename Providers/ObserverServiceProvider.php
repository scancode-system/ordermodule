<?php

namespace Modules\Order\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Order\Entities\Order;
use Modules\Order\Observers\OrderObserver;
use Modules\Order\Entities\OrderClient;
use Modules\Order\Observers\OrderClientObserver;
use Modules\Order\Entities\OrderClientAddress;
use Modules\Order\Entities\OrderSaller;
use Modules\Order\Observers\OrderSallerObserver;
use Modules\Order\Entities\Item;
use Modules\Order\Observers\ItemObserver;
use Modules\Order\Entities\ItemProduct;
use Modules\Order\Observers\ItemProductObserver;
use Modules\Order\Entities\OrderPayment;
use Modules\Order\Observers\OrderPaymentObserver;
use Modules\Order\Entities\SettingOrder;
use Modules\Order\Observers\SettingOrderObserver;


class ObserverServiceProvider extends ServiceProvider {

	public function boot() {
		Order::observe(OrderObserver::class);
		OrderClient::observe(OrderClientObserver::class);
		OrderSaller::observe(OrderSallerObserver::class);
		OrderPayment::observe(OrderPaymentObserver::class);
		Item::observe(ItemObserver::class);
		ItemProduct::observe(ItemProductObserver::class);
		SettingOrder::observe(SettingOrderObserver::class);
	}

	public function register() {
        //
	}

}
